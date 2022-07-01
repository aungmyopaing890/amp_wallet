<?php

namespace App\Http\Controllers;

use App\Models\currency;
use App\Models\TransactionType;
use App\Http\Requests\StoretransactionTypeRequest;
use App\Http\Requests\updatetransactionTypeRequest ;

class TransactionTypeController extends Controller
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
    public function create()
    {
        $currencies=currency::all();
        $transactionTypes=TransactionType::all();
        return view('transactionType.create',compact('transactionTypes','currencies'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoretransactionTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoretransactionTypeRequest $request)
    {
        $data=$request->validated();
        TransactionType::create($data);
        return redirect()->route('transactionType.create')
            ->with('flash', 'New TransactionType created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TransactionType  $transaction_type
     * @return \Illuminate\Http\Response
     */
    public function show(TransactionType $transaction_type)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransactionType  $transaction_type
     * @return \Illuminate\Http\Response
     */
    public function edit(TransactionType $transactionType)
    {
        $currencies=currency::all();
        return view('transactionType.edit',compact('currencies','transactionType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetransactionTypeRequest $request
     * @param  \App\Models\TransactionType  $transaction_type
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatetransactionTypeRequest $request, TransactionType $transactionType)
    {
        $data=$request->validated();
        $transactionType->update($data);
        return redirect()->route('transactionType.create')
            ->with('status', 'TransactionType updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransactionType  $transactionType
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransactionType $transactionType)
    {
        $transactionType->delete();
        return redirect()->back()
            ->with('status', 'TransactionType Deleted successfully!');
    }
}
