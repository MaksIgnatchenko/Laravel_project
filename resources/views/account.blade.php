@extends('layouts.layout_main')
{{--/** @var PaginationDto $dto*/--}}
@section('sidebar')
<div class="account">
    <nav class='animated bounceInDown nav'>
        <ul>
            @empty(!$user->avatar)
            <div>
                <img src="{{ $user->avatar }}" alt="">
            </div>
            @endisset
            <li>
                <a>
                    <div id="setPhoto">
                        @if(empty($user->avatar))
                            Add your photo
                        @else
                            Change your photo
                            @endif
                    </div>
                </a>
            </li>
                <div id="avatarForm">
                    <form id="profile_form" enctype="multipart/form-data" action="{{ action('UserController@userProfile') }}" method="POST">
                    <input  id="my_avatar" type="file" name="avatar" style="width: 400px"><br>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="litel" id="changeAvatar">Apply</button>
                    </form>
                </div>
            <li><a>
                    <div id="nameFormButton"><span class="t1">User Name: </span>
                        <span id="viewName">{{ $user->name }}</span>
                        (Click to change)
    </div></a></li>
            <div id="nameForm">
                <div class="group">
                    <input type="text" required id="newName">
                    <label>Your new name</label>
                </div>
                <div><button class="litel" id="changeNameButton">Change name</button></div>
            </div>
            <li><a>
                    <div id="mailFormButton"><span class="t1">E-mail:</span>
            <span id="viewMail">{{ $user->email }}</span>
        (Click to change)
    </div></a></li>
            <div id="mailForm">
                <div class="group">
                    <input type="text" required id="newMail">
                    <label>Your new email</label>
                </div>
                <div><button class="litel" id="changeMailButton">Change mail</button></div>
            </div>            
            <li><a>
                    <div><span class="t1">Role:</span>
        {{ $user->role }}
    </div></a></li>
            <li class='sub-menu' id="changeRoleRequest">
    @if($user->role === 'user')
        <a href="#">
                Request for a teacher role
        </a>
    @endif
                </li>
    <input type="hidden" id="userId" value="{{ $user->id }}">
            <li>
    <a href="#" id="changePasswordForm">
        Change password
    </a>
            </li>

    <div id="passForm">
        {{csrf_field()}}
        <div class="group">
            <input type="password" required name="currentPass" id="currentPass">
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Current password</label>
            <br>
        </div>

        <div class="group">
            <input type="password" required name="newPass" id="newPass">
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>New password</label>
            <br>
        </div>

        <div class="group">
            <input type="password" required name="newPass2" id="newPass2">
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Repeat new password</label>
            <br>
        </div>

        <div><button class="litel" id="changePassButton">Change password</button></div>
    </br>
    </div>
            </ul>
    </nav>
</div>

<script>
    $("#my_avatar").on("change", function() {
        $("#profile_form").submit();
    });
</script>
@endsection

