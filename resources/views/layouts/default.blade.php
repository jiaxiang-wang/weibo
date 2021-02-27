<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title','微博主页')</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
  @include('layouts._header')

    <div class="container">
      <div class="offset-md-1 col-md-10">
         @include('shared._messages')
         @yield('content')
         @include('layouts._footer')
      </div>
    </div>
</body>
</html>
