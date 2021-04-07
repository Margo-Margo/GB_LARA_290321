<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@section('title') Страница @show</title>
</head>
<body>
<div class="header">
    @include('blocks.menu')
</div>
<div class="content">
    @yield('content')
</div>
<div class="footer">
    This is footer
</div>
</body>
</html>