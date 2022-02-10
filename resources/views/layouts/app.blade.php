<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Authentication forms">
    <meta name="author" content="Makfuels">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/login/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login/common.css') }}" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&amp;display=swap" rel="stylesheet">
	<link href="{{ asset('css/login/theme-03.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>
<body>
@yield('content')

<script src="{{ asset('js/login/jquery.min.js') }}"></script>
<script src="{{ asset('js/login/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/login/main.js') }}"></script>
<script src="{{ asset('js/login/demo.js') }}"></script>

</body>


</html>
