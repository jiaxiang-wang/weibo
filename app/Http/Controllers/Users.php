<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class Users extends Controller
{
    //注册功能
    public function create()
    {
        return view('users.signup');
    }
    /* 
     *在下面代码中，由于 show() 方法传参时声明了类型 —— Eloquent 模型 User，
     *对应的变量名 $user 会匹配路由片段中的 {user}，这样，Laravel 会自动注入
     *与请求 URI 中传入的 ID 对应的用户模型实例 。
     *compact 方法转化为一个关联数组
     */
    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }
    /*
        注册用户提交到store方法
    */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:users|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);
        return;
    }
}
