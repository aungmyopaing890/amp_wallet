<?php

namespace App\Http\Controllers\Admin;

use App\Models\currency;
use App\Models\TransactionType;
use App\Models\TransactionLimit;
use App\Http\Requests\StoretransactionLimitRequest;
use App\Http\Requests\UpdatetransactionLimitRequest;
use App\Http\Controllers\Controller;

class TransactionLimitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $levels=collect(config('amp.levels'));
        $transactionLimits=TransactionLimit::all();
        return view('Admin.transactionLimit.create',compact('transactionTypes','currencies','levels','transactionLimits'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoretransactionLimitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoretransactionLimitRequest $request)
    {
        $data=$request->validated();
        TransactionLimit::create($data);
        return redirect()->route('transactionLimit.create')
            ->with('status', 'New Transaction Limit created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TransactionLimit  $transactionLimit
     * @return \Illuminate\Http\Response
     */
    public function show(TransactionLimit $transactionLimit)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransactionLimit  $transactionLimit
     * @return \Illuminate\Http\Response
     */
    public function edit(TransactionLimit $transactionLimit)
    {
        $currencies=currency::all();
        $transactionTypes=TransactionType::all();
        $levels=collect(config('amp.levels'));
        return view('Admin.transactionLimit.edit',compact('transactionTypes','currencies','levels','transactionLimit'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetransactionLimitRequest  $request
     * @param  \App\Models\TransactionLimit  $transactionLimit
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatetransactionLimitRequest $request, TransactionLimit $transactionLimit)
    {
        $data=$request->validated();
        $transactionLimit->update($data);
        return redirect()->route('transactionLimit.create')
            ->with('status', 'New Transaction Limit updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransactionLimit  $transactionLimit
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransactionLimit $transactionLimit)
    {
        $transactionLimit->delete();
        return redirect()->back();
    }
}
