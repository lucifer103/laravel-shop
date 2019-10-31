<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Laravel Shop') - Laravel 电商教程</title>
    <!-- 样式 -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  </head>
  <body>
    <div class="{{ route_class() }}-page" id="app">
      @include('layouts._header')
      <div class="container">
        @yield('content')
      </div>
      @include('layouts._footer')
    </div>
    <!-- JS 脚本 -->
    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
    @yield('scriptsAfterJs')
  </body>
</html>
