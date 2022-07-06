<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepositTransactionRequest;
use App\Http\Requests\WithdrawTransactionRequest;
use App\Models\Transaction;
use App\Models\TransactionLimit;
use App\Models\TransactionType;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

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
        return view('Transaction.deposit',compact('user'));
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

        $balance=$wallet->balance+$data['amount'];
        $wallet->balance=$balance;
        $wallet->update();

        if ($wallet->user->role_id=='3'){
            return redirect()->route('customer.index')
                ->with('status', 'customer Deposit successfully!');
        }
        elseif($wallet->user->role_id=='4'){
            return redirect()->route('merchant.index')
                ->with('status', 'merchant Deposit successfully!');
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
        return view('Transaction.withdraw',compact('user'));
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
        $transactionType=TransactionType::where('id','1')->first();
        $charged=(1000/100)*$transactionType->charge_percentage;
        $totalAmount=$data['amount']+$charged;

        $userMonthlyAmount=user_transaction_amount($wallet,2,'m');
        if ($userMonthlyAmount+$data['amount'] > $limit->monthly_amount) {
            return back()->with('error', 'Monthly Limit!');
        }
        $userDailyAmount=user_transaction_amount($wallet,2,'d');
        if ($userDailyAmount+$data['amount'] > $limit->daily_amount) {
            return back()->with('error', 'Daily limit!');
        }
        if ($totalAmount > $wallet->balance) {
            return back()->with('error', 'You cannot withdraw more then your balance');
        }
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

        $balance=$wallet->balance-$totalAmount;
        $wallet->balance=$balance;
        $wallet->update();

        if ($wallet->user->role_id=='3'){
            return redirect()->route('customer.index')
                ->with('status', 'customer Withdraw successfully!');
        }
        elseif($wallet->user->role_id=='4'){
            return redirect()->route('merchant.index')
                ->with('status', 'merchant Withdraw successfully!');
        }

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
