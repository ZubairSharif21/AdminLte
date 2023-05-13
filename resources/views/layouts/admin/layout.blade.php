<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
    @yield('title')
    </title>
    @include('Layout.admin.header')
</head>
<body >


@include('Layout.admin.navbar')
@yield('content')
@include('Layout.admin.left_sidebar')
@include('Layout.admin.sidebar')
@include('Layout.admin.footer')
@include('Layout.admin.script')
</body>
</html>
