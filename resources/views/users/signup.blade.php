@extends('layouts.default')
@section('title','注册')
@section('content')
<div class="offset-lg-2 col-lg-8">
    <div class="card">
        <div class="card-header">
            <h5>注册</h5>
        </div>
        <div class="card-body">
            <form action="{{route('users.store')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">名称</label>
                    <input type="text" name="name" autocomplete="off" class="form-control" value="{{old('name')}}" placeholder="请填写用户名称">
                </div>
                <div class="form-group">
                    <label for="email">邮箱</label>
                    <input type="email" name="email" autocomplete="off" class="form-control" value="{{old('email')}}" placeholder="请填写用户邮箱">
                </div>
                <div class="form-group">
                    <label for="password">密码</label>
                    <input type="password" name="password" class="form-control" value="{{old('password')}}" placeholder="请填写用户密码">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">确认密码</label>
                    <input type="password_confirmation" name="password_confirmation" class="form-control" value="{{old('password_confirmation')}}"  placeholder="请确认密码">
                </div>
                <button type="submit" class="btn btn-primary">注册</button>
            </form>
        </div>
    </div>
</div>
@stop
