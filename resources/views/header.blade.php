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
                        <a href="/main" title="Main">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <span class="link-text">Main</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admingroup" title="Admin groups">
                            <i class="fa fa-buysellads" aria-hidden="true"></i>
                            <span class="link-text">Admin Group</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admintasklists" title="Admin tasklists">
                            <i class="fa fa-bookmark" aria-hidden="true"></i>
                            <span class="link-text">Tasklists</span>
                        </a>
                    </li>
                    <li>
                        <a href="/edit" title="Update task">
                            <i class="fa fa-edit" aria-hidden="true"></i>
                            <span class="link-text">Update task</span>
                        </a>
                    </li>
                    <li>
                        <a href="/create" title="Create task">
                            <i class="fa fa-tasks" aria-hidden="true"></i>
                            <span class="link-text">Create task</span>
                        </a>
                    </li>
                    @auth
                        <li>
                            <a href="#" title="Create task">
                                <i class="fa fa-buysellads" aria-hidden="true"></i>
                                <span class="link-text">Account</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                            <span class="link-text">Sign Out</span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
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