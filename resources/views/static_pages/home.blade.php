@extends('layouts.default')
@section('title','首页')
@section('content')
  @if(Auth::check())
  <div class="row">
      <div class="col-md-8">
        <section class="status_form">
          @include('shared._status_form')
        </section>
      </div>
      <aside class="col-md-4">
        <section class="user_info">
          @include('shared._user', ['user' => Auth::user()])
        </section>
      </aside>
    </div>
  @else
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
  @endif
@stop

