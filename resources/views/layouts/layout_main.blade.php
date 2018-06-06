<!DOCTYPE html>
<html>
<head>
    <title>SourcePlanet</title>
    <link rel="shortcut icon" href="https://cdn2.iconfinder.com/data/icons/flat-seo-web-ikooni/128/flat_seo2-37-128.png">
    <link rel="stylesheet" href="{{asset('css/all.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/train.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/main.css')}}" type="text/css">
    <script type="text/javascript" src="{{asset('js/jquery-3.3.1.js')}}"></script>
    <script src="{{asset('js/src/ace.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{asset('js/src/theme-monokai.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{asset('js/src/mode-php.js')}}" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" src="{{asset('js/action.js')}}"></script>
    <style>
        body{
            font-family:helvetica;
        }
        .links > a {
            color: #636b6f;
            padding: 0 15px;
            font-size: 20px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
        .t1 {
            color: rgb(246, 246, 255);
            font-size:15px;
            font-weight: bold;
            font-style: italic ;
            text-shadow: 2px 2px 0px #000000;
        }
        .t {
            color: rgb(2, 2, 8);
            font-size:15px;
            font-weight: bold;
            font-style: italic ;
            text-shadow: 1px 1px 0px #ffffff;
        }
    </style>
</head>
<body>

@include('header')

    <div id="content">
        @yield('content')
    </div>

    <div id="sidebar">
        @yield('sidebar')
    </div>

</body>
</html>
