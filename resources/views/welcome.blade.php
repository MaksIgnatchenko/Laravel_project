<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SourcePlanet</title>
        <link rel="shortcut icon" href="https://cdn2.iconfinder.com/data/icons/flat-seo-web-ikooni/128/flat_seo2-37-128.png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- Styles -->
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
                color: #fff;
                background-color:#f0f0f0;
                font-family:helvetica;
                background:url('http://clevertechie.com/img/bnet-bg.jpg') #0f2439 no-repeat center top;
            }
            #one {
                width: 100px;
                height: 100px;
                background: orange;
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
            .full-height {
                height: 100vh;
            }
            textarea{
                background-image: url("https://avatars.mds.yandex.net/get-marketpic/200038/market_x7ShKUKy1sToBfcYaXgY4w/200x200");
            }
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 54px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;

            }

        </style>
    </head>
    <body>
        <div class=" position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                        @section('sidebar')
                            <a href="main">Пройти тестирование</a>
                        @show
                        @section('sidebar1')
                             <a href="create">Добавить задачу</a>
                        @show
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
                @yield('content')
            @endif
        </div>
    </body>
</html>

