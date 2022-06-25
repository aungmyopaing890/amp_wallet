<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users=User::latest('id')->paginate('5');
        $roles=[
            '1' => 'Admin',
            '2' => 'Manager',
            '3' => 'User'
        ];
        return view('user.index',compact('users','roles'));
    }

    public function  create(){
        return view('user.create');
    }
}
