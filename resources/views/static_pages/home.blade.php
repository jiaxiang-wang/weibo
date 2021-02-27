@extends('layouts.default')
@section('title','首页')
@section('content')
<div class="jumbotron">
  <h1>Hello </h1>
  <p class="lead">
    欢迎来到王佳博的个人主页
  </p>
  <p>一切从这里开始</p>
  <p>
    <a href="{{route('signup')}}" class="btn btn-lg btn-success" role="button">现在注册</a>
  </p>
</div>
@stop

