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
        button{
            position: relative; left: 2%;
            font-weight: bold;
            color: white;
            text-decoration: none;
            text-shadow: 0 -1px 1px #cc5500;
            user-select: none;
            padding: .8em 2em;
            outline: none;
            border-radius: 1px;
            background: linear-gradient(to left, rgba(0,0,0,.3), rgba(0,0,0,.0) 50%, rgba(0,0,0,.3)), linear-gradient(#d77d31, #fe8417, #d77d31);
            background-size: 100% 100%, auto;
            background-position: 50% 50%;
            box-shadow: inset #ebab00 0 -1px 1px, inset 0 1px 1px #ffbf00, #cc7722 0 0 0 1px, #000 0 10px 15px -10px;
            transition: 0.2s;
        }
        button:hover {
            background-size: 140% 100%, auto;
        }
        button:active {
            top: 1px;
            color: #ffdead;
            box-shadow: inset #ebab00 0 -1px 1px, inset 0 1px 1px #ffbf00, #cc7722 0 0 0 1px, 0 10px 10px -9px #000;
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
