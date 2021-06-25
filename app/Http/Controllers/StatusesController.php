<?php

namespace App\Http\Controllers;

use App\Models\Statuses;
use Illuminate\Http\Request;
use Auth;
class StatusesController extends Controller
{
    //
    public function __construct(){
        $this->middleware("auth");
    }
    //微博内容验证
    public function store(Request $request){
        $this->validate($request,[
            'content'=>"required|max:140"
        ]);
        Auth::user()->statuses()->create([
            'content'=>$request['content']
        ]);
        session()->flash('success','发布成功！');
        return redirect()->back();
    }

    public function destroy(Statuses $status)
    {
        $this->authorize('destroy', $status);
        $status->delete();
        session()->flash('success', '微博已被成功删除！');
        return redirect()->back();
    }
}
