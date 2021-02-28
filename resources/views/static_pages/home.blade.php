@extends('layouts.default')
@section('title','首页')
@section('content')
<div class="jumbotron">
  <h1>你好！</h1>
  <p class="lead">
   欢迎访问我的博客!
  </p>
  <p>一切从这里开始</p>
  <p>
    <a href="{{route('signup')}}" class="btn btn-lg btn-success" role="button">现在注册</a>
  </p>
</div>
@stop

