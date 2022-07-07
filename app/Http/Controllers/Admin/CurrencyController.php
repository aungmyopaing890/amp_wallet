<?php

namespace App\Http\Controllers\Admin;

use App\Models\currency;
use App\Http\Requests\StorecurrencyRequest;
use App\Http\Requests\UpdatecurrencyRequest;
use App\Http\Controllers\Controller;

class CurrencyController extends Controller
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
        return view('Admin.currency.create',compact('currencies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorecurrencyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecurrencyRequest $request)
    {
        $data=$request->validated();
        currency::create($data);
        return redirect()->route('Admin.currency.create')
            ->with('flash', 'User created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function show(currency $currency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function edit(currency $currency)
    {
        return view('Admin.currency.edit', compact('currency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecurrencyRequest  $request
     * @param  \App\Models\currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecurrencyRequest $request, currency $currency)
    {
        $data=$request->validated();
        $currency->update($data);
        return redirect()->route('Admin.currency.create')
            ->with('status', 'Currency updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function destroy(currency $currency)
    {
        $currency->delete();
        return redirect()->back()->with('status', 'Currency deleted successfully!');;
    }
}
