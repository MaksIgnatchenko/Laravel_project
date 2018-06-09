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

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .btn-draw {
            position: relative;
            display: inline-block;
            color: #324577;
            border-bottom: 2px solid #324577;
            cursor: pointer;
            overflow: hidden;
            -webkit-transition: color 0.2s ease-in-out, background-color 0.2s ease-in-out;
            transition: color 0.2s ease-in-out, background-color 0.2s ease-in-out;
        }
        .btn-draw:after {
            content: '';
            position: absolute;
            right: 0;
            bottom: 0;
            height: 100%;
            width: 2px;
            background: #324577;
            -webkit-transform: translateY(100%);
            transform: translateY(100%);
            -webkit-transition: -webkit-transform 0.2s ease-in-out;
            transition: -webkit-transform 0.2s ease-in-out;
            transition: transform 0.2s ease-in-out;
            transition: transform 0.2s ease-in-out, -webkit-transform 0.2s ease-in-out;
            -webkit-transition-delay: 0.6s;
            transition-delay: 0.6s;
        }
        .btn-draw > span {
            position: relative;
            display: block;
            padding: 0.5em;
            color: inherit;
        }
        .btn-draw > span:before, .btn-draw > span:after {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            background: #324577;
            -webkit-transition: -webkit-transform 0.2s ease-in-out;
            transition: -webkit-transform 0.2s ease-in-out;
            transition: transform 0.2s ease-in-out;
            transition: transform 0.2s ease-in-out, -webkit-transform 0.2s ease-in-out;
        }
        .btn-draw > span:before {
            height: 2px;
            width: 100%;
            -webkit-transform: translateX(100%);
            transform: translateX(100%);
            -webkit-transition-delay: 0.4s;
            transition-delay: 0.4s;
        }
        .btn-draw > span:after {
            height: 100%;
            width: 2px;
            -webkit-transform: translateY(-100%);
            transform: translateY(-100%);
            -webkit-transition-delay: 0.2s;
            transition-delay: 0.2s;
        }
        .btn-draw:hover:after, .btn-draw:hover > span:before, .btn-draw:hover > span:after {
            -webkit-transform: translate(0, 0);
            transform: translate(0, 0);
        }
        .btn-draw:hover:after {
            -webkit-transition-delay: 0s;
            transition-delay: 0s;
        }
        .btn-draw:hover > span:before {
            -webkit-transition-delay: 0.2s;
            transition-delay: 0.2s;
        }
        .btn-draw:hover > span:after {
            -webkit-transition-delay: 0.4s;
            transition-delay: 0.4s;
        }
        .btn-draw:hover {
            color: #e4e4e2;
            background-color: #324577;
            -webkit-transition-delay: 0.2s;
            transition-delay: 0.2s;
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
