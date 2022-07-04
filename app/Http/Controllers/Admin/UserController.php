<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\currency;
use App\Models\Profile;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users=User::latest('id')->where('role_id','1')->orwhere('role_id','2')->get();
        return view('user.index',compact('users'));
    }
    public function customerIndex()
    {
        $users=User::where('role_id','3')->get();
        return view('user.index',compact('users'));
    }
    public function merchantIndex()
    {
        $users=User::latest('id')->where('role_id','4')->get();
        return view('user.index',compact('users'));
    }
    public function  create(){
        $roles=collect(config('amp.roles'));
        $currencies=currency::all();
        return view('user.create',compact('roles','currencies'));
    }
    public function store(StoreUserRequest $request)
    {
        $data=$request->validated();
        $newName="";
        if ($request->hasFile('imgPath')) {
            $newName= store_image($request,'users','imgPath');
        }
        $user=User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'role_id' => $data['role_id'],
        ]);
        $user->profile()->create([
            'fullName' => $data['fullName'],
            'address' => $data['address'],
            'nrc' => $data['nrc'],
            'dob' => $data['dob'],
            'phoneNumber' => $data['phoneNumber'],
            'imgPath'=>$newName
        ]);
        if ($data['role_id']!='1'and'2'){
            $user->wallet()->create([
                'currency_id' => $data['currency_id'],
                'balance'=>0
            ]);
        }
        return redirect()->route('user.index')
            ->with('status', 'New User created successfully!');
    }
    public function edit(User $user){
        $roles=collect(config('amp.roles'));
        $currencies=currency::all();
        return view('user.edit',compact('roles','currencies','user'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\User\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user){

        $user->name=$request['name'];
        $user->email=$request['email'];
        $user->role_id=$request['role_id'];
        $user->update();
        $profile=$user->profile;
        $profile->fullName=$request['fullName'];
        $profile->address=$request['address'];
        $profile->nrc=$request['nrc'];
        $profile->dob=$request['dob'];
        $profile->phoneNumber=$request['phoneNumber'];
        if ($request->hasFile('imgPath')) {
            Storage::delete('public/'.$profile->imgPath);
            $profile->imgPath=store_image($request,'users','imgPath');
        }
        $profile->update();
        return redirect()->route('user.index')
            ->with('status', 'User Updated successfully!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Storage::delete("public/users/".$user->profile->imgPath);
        $profile=$user->profile;
        $profile->delete();
        $user->delete();
        return redirect()->back()
            ->with('status', 'User Deleted successfully!');
    }
}
