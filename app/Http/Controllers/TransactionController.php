<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepositTransactionRequest;
use App\Http\Requests\WithdrawTransactionRequest;
use App\Models\BankerLog;
use App\Models\BankerWallet;
use App\Models\Transaction;
use App\Models\TransactionLimit;
use App\Models\TransactionLog;
use App\Models\TransactionType;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;
use function PHPUnit\Framework\isNull;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {

    }

    /**
     * Show the form for Deposit.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDeposit(string $user_id)
    {
        $user=User::where('id',$user_id)->first();
        return $user->is_ban()? back()->with('errorToast', 'This account has baned!') : view('Transaction.deposit',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DepositTransactionRequest $request
     * @return \Illuminate\Http\Response
     */
    public function postDeposit(DepositTransactionRequest $request)
    {
        $data=$request->validated();
        $wallet=Wallet::where('id',$data['wallet_id'])->first();
        DB::beginTransaction();
        try {
            $transaction=New Transaction();
            $transaction->to=$data['wallet_id'];
            $transaction->transfer_amount=$data['amount'];
            $transaction->total=$data['amount'];
            $transaction->charged=0;
            $transaction->currency_id=$wallet->currency_id;
            $transaction->user_id=Auth::user()->id;
            $transaction->transactionType_id=1;
            $transaction->status=1;
            $transaction->save();
            TransactionLog::create([
                'wallet_id'=>$wallet->id,
                'amount'=>$data['amount'],
                'transactionType_id'=>'1',
                'staff_id'=>Auth::user()->id,
                'status'=>'1',
            ]);
            $wallet->increment('balance',$data['amount']);
            DB::commit();
            return $wallet->user->role_id=='3' ?
                redirect()->route('customer.index')->with('status', 'customer Deposit successfully!') :
                redirect()->route('merchant.index')->with('status', 'merchant Deposit successfully!');

        }catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()], 500);
        }


    }
    /**
     * Show the form for Deposit.
     *
     * @return \Illuminate\Http\Response
     */
    public function getWithdraw(string $user_id)
    {
        $user=User::where('id',$user_id)->first();
        return $user->is_ban()? back()->with('errorToast', 'This account has baned!') :  view('Transaction.withdraw',compact('user'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param WithdrawTransactionRequest $request
     * @return \Illuminate\Http\Response
     */
    public function postWithdraw(WithdrawTransactionRequest $request)
    {
        $data=$request->validated();
        $wallet=Wallet::where('id',$data['wallet_id'])->first();
        $limit=TransactionLimit::where('transaction_type_id','2')
            ->where('level_id',$wallet->level_id)
            ->where('currency_id',$wallet->currency_id)
            ->first();

        $userMonthlyAmount=user_transaction_amount($wallet,2,'m');
        if ($userMonthlyAmount+$data['amount'] > $limit->monthly_amount) {
            return back()->with('error', 'Monthly Limit!');
        }
        $userDailyAmount=user_transaction_amount($wallet,2,'d');
        if ($userDailyAmount+$data['amount'] > $limit->daily_amount) {
            return back()->with('error', 'Daily limit!');
        }
        $charged=charge_amount($data['amount'],2);
        $totalAmount=$data['amount']+$charged;
        if ($totalAmount > $wallet->balance) {
            return back()->with('error', 'Insufficient balance');
        }
        DB::beginTransaction();
        try {
            $transaction=New Transaction();
            $transaction->from=$data['wallet_id'];
            $transaction->transfer_amount=$data['amount'];
            $transaction->charged=$charged;
            $transaction->total=$totalAmount;
            $transaction->currency_id = $wallet->currency_id;
            $transaction->user_id=Auth::user()->id;
            $transaction->transactionType_id=2;
            $transaction->status=1;
            $transaction->save();
            TransactionLog::create([
                'wallet_id'=>$wallet->id,
                'amount'=>$totalAmount,
                'transactionType_id'=>2,
                'staff_id'=>Auth::user()->id,
                'status'=>1,
            ]);
            BankerLog::create([
                'wallet_id'=>$wallet->id,
                'amount'=>$charged,
                'staff_id'=>Auth::user()->id,
                'description'=>'Withdraw Charged',
            ]);
            BankerWallet::find(1)->increment('amount',$charged);
            $wallet->decrement('balance',$totalAmount);
            DB::commit();
            return $wallet->user->role_id=='3' ?
                redirect()->route('customer.index')->with('status', 'customer Withdraw successfully!') :
                redirect()->route('merchant.index')->with('status', 'merchant Withdraw successfully!');
        }catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for Deposit.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTransaction()
    {
        return view('Transaction.transaction');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getTransfer(Request $request)
    {

        if($request->wallet_id==Auth::user()->wallet->id){
            return back()->with('errorToast', 'You cannot transfer to your own account!');
        }
        $wallet=Wallet::find($request->wallet_id);
        if($wallet==""){
            return back()->with('errorToast', 'Wrong wallet ID!');
        }
        return view('Transaction.transfer',compact('wallet'));
    }
    public function Transfer(Request $request)
    {
        $wallet=Auth::user()->wallet;
        if ($wallet->balance<$request->amount){
            return back()->with('errorToast', 'Insufficient balance!');
        }
        $wallet->decrement('balance',$request->amount);
        Wallet::find($request->wallet_id)->increment('balance',$request->amount);

        return redirect()->route('getTransaction')
            ->with('status', 'Money Transfer successful!');
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
