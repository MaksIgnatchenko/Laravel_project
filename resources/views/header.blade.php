<header>
    <div>
        <a href="/">
            <div class="stage">
                <div class="layer"></div>
                <div class="layer"></div>
                <div class="layer"></div>
                <div class="layer"></div>
                <div class="layer"></div>
                <div class="layer"></div>
                <div class="layer"></div>
                <div class="layer"></div>
                <div class="layer"></div>
                <div class="layer"></div>
                <div class="layer"></div>
                <div class="layer"></div>
                <div class="layer"></div>
                <div class="layer"></div>
                <div class="layer"></div>
                <div class="layer"></div>
                <div class="layer"></div>
                <div class="layer"></div>
                <div class="layer"></div>
                <div class="layer"></div>
            </div>
        </a>
    </div>
    <ul id="profile">
        <li class="menu-item">
            <a href="">
                <div>
                    <img src="{{asset('images/avatar.png')}}">
                </div>
                <div class="rang">
                    <span>Master (1050)</span>
                </div>
            </a>
        </li>
        <li class="menu-item">
            <ul class="sub-menu">
                <li>
                    <a href="">View profile</a>
                </li>
                <hr>
                <li>
                    <a href="create">Create new task</a>
                </li>
                <hr>
                <li>
                    <a href="">Sign Out</a>
                </li>
            </ul>
        </li>
    </ul>
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a class="btn-draw" href="{{ route('login') }}">Login</a>
                <a class="btn-draw" href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    @endif

</header>
