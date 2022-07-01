<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Requests\StoreserviceRequest;
use App\Http\Requests\UpdateserviceRequest;
use App\Models\ServiceType;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
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
        $services= Service::all();
        $serviceTypes=ServiceType::all();
        return view('service.create',compact('services','serviceTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreserviceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreserviceRequest $request)
    {
        $service=new Service();
        $service->name=$request->name;
        if ($request->hasFile('img')) {
            $service->img= store_image($request,'services','img');
        }
        if($request->status!=""){
            $service->status=$request->status;
        }
        $service->price=$request->price;
        $service->description=$request->description;
        $service->sorting=$request->sorting;
        $service->service_type_id=$request->service_type_id;
        $service->save();
        return redirect()->route('service.create')
            ->with('status', 'New serviceType created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $serviceTypes=ServiceType::all();
        return view('service.edit',compact('service','serviceTypes'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateserviceRequest  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateserviceRequest $request, Service $service)
    {
        $service->name=$request->name;
        if ($request->hasFile('img')) {
            if ($service->img!="image-default.png") {
                Storage::delete("public/services/".$service->img);
            }
            $service->img= store_image($request,'services','img');
        }
        if($request->status!=""){
            $service->status=$request->status;
        }
        else{
            $service->status=0;
        }
        $service->price=$request->price;
        $service->description=$request->description;
        $service->sorting=$request->sorting;
        $service->service_type_id=$request->service_type_id;
        $service->save();
        return redirect()->route('service.create')
            ->with('status', 'New serviceType updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        if($service->img != "image-default.png")
        {
            Storage::delete("public/services/".$service->img);
        }
        $service->delete();
        return redirect()->back()
            ->with('status', 'Service Deleted successfully!');
    }
}
