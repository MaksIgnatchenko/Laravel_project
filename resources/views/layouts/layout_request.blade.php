<!DOCTYPE html>
<html>
<head>
    <title>SourcePlanet</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="https://cdn2.iconfinder.com/data/icons/flat-seo-web-ikooni/128/flat_seo2-37-128.png">
    <link rel="stylesheet" href="{{asset('css/all.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/input.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/train.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/easyzoom.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/main.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/button.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/accordeon.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/pagination.css')}}" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Oswald:300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">
    <link rel="stylesheet" href="{{asset('css/account.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/ok.css')}}" type="text/css">
    <script type="text/javascript" src="{{asset('js/jquery-3.3.1.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery-ui.js')}}"></script>
    <script src="{{asset('js/src/ace.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{asset('js/src/theme-monokai.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{asset('js/src/mode-php.js')}}" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" src="{{asset('js/action.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/account.js')}}" defer></script>
    @if (Route::has('login'))
        @if ($user->role === 'admin')
            <script src="{{asset('js/roleRequests.js')}}" type="text/javascript" charset="utf-8" defer></script>
        @endif
    @endif
</head>
<body>

@include('header')

<div id="content1">
    @yield('content1')
</div>

<div id="sidebar">
    @yield('sidebar')
</div>

</body>
</html>