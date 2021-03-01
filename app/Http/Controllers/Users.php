<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Mail;
use Auth;

class Users extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth',[
            'except' => ['create','store','index','confirmEmail']
        ]);
        $this->middleware('guest',[
            'only' => ['create']
        ]);
    }
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
        $this->authorize('show',$user);//1.设置策略 2.编写策略页面方法 3.编写自动注册方法
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
        //Auth::login($user);
        $this->sendEmailConfirmationTo($user);
        //存入一条临时数据 只在下一次请求前有效
        session()->flash('success','验证邮件已发送到你的注册邮箱上，请注意查收。');
        return redirect('/');
    }
    public function edit(User $user)
    {
        $this->authorize('update',$user);
        //compact创建一个包含变量名和它们的值的数组：
        return view('users.edit',compact('user'));
    }
    public function update(User $user,Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:50',
            'password' => 'nullable|confirmed|min:6'
        ]);
        $data=[];
        $data['name'] = $request->name;
        if($request->password){
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);
        session()->flash('success','个人资料更新成功！');
        return redirect()->route('users.show',$user->id);
    }
    public function index(){
        $users = User::paginate(10);
        return view('users.index',compact('users'));
    }
    /**
     * 我们首先会根据路由发送过来的用户 id 进行数据查找，
     * 查找到指定用户之后再调用 Eloquent 模型提供的 
     * delete 方法对用户资源进行删除，成功删除后在页面
     * 顶部进行消息提示。最后将用户重定向到上一次进行删除操作的页面，即用户列表页。
     */
    public function destroy(User $user){
        $this->authorize('destroy',$user);
        $user->delete();
        session()->flash('success','删除用户成功！');
        return back();
    }
    protected function  sendEmailConfirmationTo($user)
    {
        $view = 'emails.confirm';
        $data = compact('user');
        $from = 'summer@example.com';
        $name = 'Summer';
        $to = $user->email;
        $subject = "感谢注册weibo应用！请确认你的邮箱！";

        Mail::send($view,$data,function($message) use ($from,$name,$to,$subject){
            $message->from($from,$name)->to($to)->subject($subject);
        });
    }
    /**
     * Auth 中间件黑名单中，我们增加了 confirmEmail 来开启未登录用户的访问。
     *在 confirmEmail 中，我们会先根据路由传送过来的 activation_token 参数从数据库中查找相对应的用户，
     *Eloquent 的 where 方法接收两个参数，第一个参数为要进行查找的字段名称，第二个参数为对应的值，查询结
     *果返回的是一个数组，因此我们需要使用 firstOrFail 方法来取出第一个用户，在查询不到指定用户时将返回一
     *个 404 响应。在查询到用户信息后，我们会将该用户的激活状态改为 true，激活令牌设置为空。最后将激活成功
     *的用户进行登录，并在页面上显示消息提示和重定向到个人页面。
     */
    public function confirmEmail($token)
    {
        $user = User::where('activation_token',$token)->firstOrFail();
        $user->activated = true;
        $user->activation_token = null;
        $user->save();

        Auth::login($user);
        session()->flash('success','恭喜你，激活成功！');
        return redirect()->route('users.show',[$user]);
    }
}
