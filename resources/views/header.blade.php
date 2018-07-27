
<header style="position: relative">
    <div>
        <a href="/">
            <div  class="stage">
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
                        <a href="/adminusertasklists" title="Admin usertasklists">
                            <i class="fa fa-book" aria-hidden="true"></i>
                            <span class="link-text">User Modules</span>
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
                            <a href="/account" title="Create task">
                                <i class="fa fa-cog" aria-hidden="true"></i>
                                <span class="link-text">Account</span>
                            </a>
                        </li>
                    @if ($user->role === 'admin')
                        <li>                            
                        <a href="/show-requests" title="Requests">
                            <i class="fa fa-envelope" aria-hidden="true" id="roleRequests"></i>
                            <span class="link-text">Requests</span>
                        </a>
                    </li>
                    @endif
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
    @if(Auth::user())

        <div class="easyzoom easyzoom--overlay" >
            <a href="/images/avatars/{{Auth::user()->big_avatar}}">
                <img id="av_img" src="/images/avatars/{{Auth::user()->avatar}}"/>
            </a>
        </div>

    <ul id="profile"  >
        <li class="menu-item">
            <a href="">
                <div>

                    <form id="profile_form" enctype="multipart/form-data" action="{{ action('UserController@userProfile') }}" method="POST">
                        <p class="load"><i style="" class="fa fa-download delete1" aria-hidden="true"></i><br><br>load avatar<input id="my_avatar" type="file" name="avatar" class="hidden"></p>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>
                </div>
                <div class="rang">
                    <span>
                        {{Auth::user()->name}}
                        @foreach(Auth::user()->groups()->get() as $user_group)
                        {{$user_group->name}}
                        @endforeach
                    </span>

                </div>
            </a>
        </li>
    </ul>
        @else
        <ul id="profile_default">
            <li class="menu-item">
                <a href="">
                    <div>
                        <img src="/images/avatars/default.png">
                    </div>
                    <div class="rang">
                        <span>Guest</span>
                    </div>
                </a>
            </li>
        </ul>
        @endif
</header>

<script src="/js/zoom/dist/easyzoom.js"></script>
<script type="text/javascript">

    $("#my_avatar").on("change", function() {
        $("#profile_form").submit();
    });
    var $easyzoom = $('.easyzoom').easyZoom()
    var speed=500
    $easyzoom.hover(function() {
        $('#av_img').stop().animate({height:300, width:300, borderRadius:0, opacity: 0.0,},speed);
    },function(){
        $('#av_img').stop().animate({height:65, width:65, borderRadius:40,opacity: 1, },speed);
    })

</script>