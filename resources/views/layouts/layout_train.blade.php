<!DOCTYPE html>
<html>
<head>
    <title>SoursePlanet</title>
    <link rel="shortcut icon" href="https://cdn2.iconfinder.com/data/icons/flat-seo-web-ikooni/128/flat_seo2-37-128.png">
    <link rel="stylesheet" href="{{asset('css/all.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/train.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/main.css')}}" type="text/css">
    <script type="text/javascript" src="{{asset('js/jquery-3.3.1.js')}}"></script>
    <script src="{{asset('js/src/ace.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{asset('js/src/theme-monokai.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{asset('js/src/mode-php.js')}}" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" src="{{asset('js/action.js')}}"></script>
</head>
<body>

@include('header')

<div id="left-content">
    @yield('left-content')
</div>

<div id="right-content">
    @yield('right-content')
</div>

</body>
</html>

