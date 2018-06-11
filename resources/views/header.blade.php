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
    @if (Route::has('login'))
    <nav>
        <div class="menu">
            <ul class="clear">
                <li>
                    <a href="#" title="Home">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <span class="link-text">Home</span>
                    </a>
                </li>
                <li>
                    <a href="#" title="Create task">
                        <i class="fa fa-tasks" aria-hidden="true"></i>
                        <span class="link-text">Create task</span>
                    </a>
                </li>
                @auth
                <li>
                    <a href="#" title="Sign Out">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                        <span class="link-text">Sign Out</span>
                    </a>
                </li>
                @else
                <li>
                    <a href="{{ route('login') }}" title="Login">
                        <i class="fa fa-sign-in" aria-hidden="true"></i>
                        <span class="link-text">Login</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('register') }}" title="Register">
                        <i class="fa fa-registered" aria-hidden="true"></i>
                        <span class="link-text">Register</span>
                    </a>
                </li>
                @endauth
            </ul>
        </div>
    </nav>
    @endif
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
    </ul>
</header>
