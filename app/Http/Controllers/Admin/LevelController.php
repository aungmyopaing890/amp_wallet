<?php

namespace App\Http\Controllers\Admin;

use App\Models\Level;
use App\Http\Requests\StorelevelRequest;
use App\Http\Requests\UpdatelevelRequest;
use App\Http\Controllers\Controller;

class LevelController extends Controller
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
        $levels=Level::all();
        return view('level.create',compact('levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorelevelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorelevelRequest $request)
    {
        $data=$request->validated();
        Level::create($data);
        return redirect()->route('level.create')
            ->with('status', 'New Level created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function show(Level $level)
    {
        $level->delete();
        return   redirect()->back()->with('status', 'Successfully Deleted!');;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function edit(Level $level)
    {
        return view('level.edit', compact('level'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatelevelRequest  $request
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatelevelRequest $request, Level $level)
    {
        $data=$request->validated();
        $level->update($data);
        return redirect()->route('level.create')
            ->with('status', 'Level updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function destroy(Level $level)
    {
        $level->delete();
        return   redirect()->back();
    }
}
