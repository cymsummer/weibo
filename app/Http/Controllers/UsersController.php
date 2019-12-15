<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class UsersController extends Controller
{
    public function __construct(){
        $this->middleware('auth',[
            'except'=>['show','create','store']
        ]);
        $this->middleware('guest',[
            'only'=>['create']
        ]);
    }

    //创建页面
    public function create()
    {
        return view("users.create");
    }

    //列表展示
    public function show(User $user){
        return view('users.show',compact('user'));
    }

    //数据信息验证
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
        ]);
        Auth::login($user);
        session()->flash('success','欢迎，您将在这里开启一段新的旅程～');
        return redirect()->route('users.show',[$user]);
    }

    //编辑页面
    public function edit(User $user){
        $this->authorize('update', $user);
        return view('users.edit',compact('user'));
    }

    //修改用户信息
    public function update(User $user,Request $request){
        $this->authorize('update', $user);
        $this->validate($request,[
            'name'=>'required|max:50',
            'password'=>'nullable|confirmed|min:6'
        ]);
        $data=[];
        $data['name']=$request->name;
        if($request->password){
            $data['password']=bcrypt($request->password);
        }
        $user->update($data);
        session()->flash("success","个人资料更新成功！");
        return redirect()->route('users.show',$user);
    }
}
