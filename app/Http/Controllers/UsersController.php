<?php

namespace App\Http\Controllers;

use App\Models\User;

class UsersController extends Controller
{
    //创建页面
    public function create()
    {
        return view("users.create");

    }

    //列表展示
    public function show(User $user){
        return view('users.show',compact('user'));
    }
}
