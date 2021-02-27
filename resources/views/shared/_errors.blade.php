<!-- 
    Laravel 默认会将所有的验证错误信息进行闪存。
当检测到错误存在时，Laravel 会自动将这些错
误消息绑定到视图上，因此我们可以在所有的视图
上使用 errors 变量来显示错误信息
 -->
@if(count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif