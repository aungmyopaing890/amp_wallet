<?php

namespace App\Http\Controllers;

use App\Models\ServiceType;
use App\Http\Requests\StoreServiceTypeRequest;
use App\Http\Requests\UpdateServiceTypeRequest;
use Illuminate\Support\Facades\Storage;

class ServiceTypeController extends Controller
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
        $serviceTypes=ServiceType::all();
        return view('serviceType.create',compact('serviceTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreServiceTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceTypeRequest $request)
    {
        $serviceType=new ServiceType();
        $serviceType->name=$request->name;
        if ($request->hasFile('img')) {
            $dir="public/servicesType";
            $file = $request->file("img");
            $newName = uniqid()."_"."servicesType.".$file->getClientOriginalExtension();
            $request->file("img")->storeAs($dir,$newName);
            $serviceType->img=$newName;
        }
        if($request->status!=""){
            $serviceType->status=$request->status;
        }
        $serviceType->save();
        return redirect()->route('serviceType.create')
            ->with('status', 'New serviceType created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceType $serviceType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceType $serviceType)
    {
        return view('serviceType.edit',compact('serviceType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServiceTypeRequest  $request
     * @param  \App\Models\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceTypeRequest $request, ServiceType $serviceType)
    {
        $serviceType->name = $request->name;
        if ($request->hasFile('img')) {
            Storage::delete("public/servicesType/".$serviceType->img);
            $dir="public/servicesType";
            $file = $request->file("img");
            $newName = uniqid()."_"."servicesType.".$file->getClientOriginalExtension();
            $request->file("img")->storeAs($dir,$newName);
            $serviceType->img=$newName;
        }
        if($request->status!=""){
            $serviceType->status=$request->status;
        }
        else{
            $serviceType->status=0;
        }
        $serviceType->update();

        return redirect()->route('serviceType.create')
            ->with('status', 'ServiceType Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceType $serviceType)
    {
        $serviceType->delete();
        if($serviceType->img != "image-default.png")
        {
            Storage::delete("public/servicesType/".$serviceType->img);
        }
        return redirect()->back()
            ->with('status', 'TransactionType Deleted successfully!');
    }
}
