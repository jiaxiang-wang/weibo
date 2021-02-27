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
    册用户提交到store方法
    User::create() 创建成功后会返回一个用户对象
    route() 方法会自动获取 Model 的主键
    函数 redirect() 可以将用户重定向到不同的页面

    session() 方法来访问会话实例
    只存入一条缓存的数据，让它只在下一次的请求内有效时，则可以使用 flash 方法
    flash 方法接收两个参数，第一个为会话的键，第二个为会话的值
    */
    public function store(Request $request)
    {
        //验证表单
        $this->validate($request, [
            'name' => 'required|unique:users|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);
        //验证成功后把数据保存到数据库
        //
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        //存入一条临时数据 只在下一次请求前有效
        session()->flash('success','欢迎，您将在这里开启一段新的旅程~0.0');
        return redirect()->route('users.show',[$user]);
    }
}
