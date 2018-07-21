<!DOCTYPE html>
<html>
<head>
    <title>SourcePlanet</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="https://cdn2.iconfinder.com/data/icons/flat-seo-web-ikooni/128/flat_seo2-37-128.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">
    <link rel="stylesheet" href="{{asset('css/all.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/accordeon.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/main.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/input.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/table.css')}}" type="text/css">
    <script type="text/javascript" src="{{asset('js/jquery-3.3.1.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery-ui.js')}}"></script>

</head>
<body>

@include('header')

<div id="sidebar3">
    @yield('sidebar')
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script type="text/javascript" src="{{asset('js/accordeon.js')}}"></script>
</body>
</html>