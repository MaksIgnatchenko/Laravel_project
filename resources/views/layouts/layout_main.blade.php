<!DOCTYPE html>
<html>
<head>
    <title>SourcePlanet</title>
    <link rel="shortcut icon" href="https://cdn2.iconfinder.com/data/icons/flat-seo-web-ikooni/128/flat_seo2-37-128.png">
    <link rel="stylesheet" href="{{asset('css/all.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/train.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/main.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/pagination.css')}}" type="text/css">
    <script type="text/javascript" src="{{asset('js/jquery-3.3.1.js')}}"></script>
    <script src="{{asset('js/src/ace.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{asset('js/src/theme-monokai.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{asset('js/src/mode-php.js')}}" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" src="{{asset('js/action.js')}}"></script>
    <script src="https://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <style>


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
            background-color: #f6f6ff;
            -webkit-transition-delay: 0.2s;
            transition-delay: 0.2s;
        }


        /*css for 3d*/

        .stage {
            height: 50px;
            width: 50px;
            /*margin: auto;*/
            position: absolute;
            top: 0px;
            right:0px;
            bottom: 0;
            left: 0;
            perspective: 9999px;
            transform-style: preserve-3d;
        }

        .layer {
            width: 100%;
            height: 100%;
            position: absolute;
            transform-style: preserve-3d;
            animation: ಠ_ಠ 5s infinite alternate ease-in-out -7.5s;
            animation-fill-mode: forwards;
            transform: rotateY(40deg) rotateX(33deg) translateZ(0);
        }

        .layer:after {
            font: 50px/0.65 'Pacifico', 'Kaushan Script', Futura, 'Roboto', 'Trebuchet MS', Helvetica, sans-serif;
            content: 'Source\A    planet!';
            white-space: pre;
            text-align: center;
            height: 100%;
            width: 100%;
            position: absolute;
            top: 50px;
            color: #aeaeae;
            letter-spacing: -2px;
            text-shadow: 4px 0 10px rgba(0, 0, 0, 0.13);
        }

        .layer:nth-child(1):after {
            transform: translateZ(0px);
        }

        .layer:nth-child(2):after {
            transform: translateZ(-1.5px);
        }

        .layer:nth-child(3):after {
            transform: translateZ(-3px);
        }

        .layer:nth-child(4):after {
            transform: translateZ(-4.5px);
        }

        .layer:nth-child(5):after {
            transform: translateZ(-6px);
        }

        .layer:nth-child(6):after {
            transform: translateZ(-7.5px);
        }

        .layer:nth-child(7):after {
            transform: translateZ(-9px);
        }

        .layer:nth-child(8):after {
            transform: translateZ(-10.5px);
        }

        .layer:nth-child(9):after {
            transform: translateZ(-12px);
        }

        .layer:nth-child(10):after {
            transform: translateZ(-13.5px);
        }

        .layer:nth-child(11):after {
            transform: translateZ(-15px);
        }

        .layer:nth-child(12):after {
            transform: translateZ(-16.5px);
        }

        .layer:nth-child(13):after {
            transform: translateZ(-18px);
        }

        .layer:nth-child(14):after {
            transform: translateZ(-19.5px);
        }

        .layer:nth-child(15):after {
            transform: translateZ(-21px);
        }

        .layer:nth-child(16):after {
            transform: translateZ(-22.5px);
        }

        .layer:nth-child(17):after {
            transform: translateZ(-24px);
        }

        .layer:nth-child(18):after {
            transform: translateZ(-25.5px);
        }

        .layer:nth-child(19):after {
            transform: translateZ(-27px);
        }

        .layer:nth-child(20):after {
            transform: translateZ(-28.5px);
        }

        .layer:nth-child(n+10):after {
            -webkit-text-stroke: 3px rgba(0, 0, 0, 0.25);
        }

        .layer:nth-child(n+11):after {
            -webkit-text-stroke: 15px rgba(127, 164, 222, 0.38);
            text-shadow: 6px 0 6px #00366b, 5px 5px 5px #002951, 0 6px 6px #00366b;
        }

        .layer:nth-child(n+12):after {
            -webkit-text-stroke: 15px rgba(127, 164, 222, 0.42);
        }

        .layer:last-child:after {
            -webkit-text-stroke: 17px rgba(0, 0, 0, 0.1);
        }

        .layer:first-child:after {
            color: #fff;
            text-shadow: none;
        }

        @keyframes ಠ_ಠ {
            100% {
                transform: rotateY(-40deg) rotateX(-43deg);
            }
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
