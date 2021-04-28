<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>@section('title') Страница @show</title>
</head>
<body>
<div style="position: relative; z-index: 1; height: 100vh;">
<div class="header">
    @include('blocks.menu')
</div>
<div class="content container">
    @yield('content')
</div>
</div>
<div class="footer container">
    This is footer
</div>
</body>
</html>