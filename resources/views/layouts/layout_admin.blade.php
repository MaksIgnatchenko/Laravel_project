<!DOCTYPE html>
<html>
<head>
    <title>SourcePlanet</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">
    <link rel="stylesheet" href="{{asset('css/all.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/accordeon.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/main.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/input.css')}}" type="text/css">
</head>
<body>

@include('header')

<div id="content">
    @yield('content')
</div>
<div id="sidebar1">
    @yield('sidebar')
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script type="text/javascript" src="{{asset('js/accordeon.js')}}"></script>
</body>
</html>
