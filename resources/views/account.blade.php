@extends('layouts.layout_main')
{{--/** @var PaginationDto $dto*/--}}
@section('sidebar')
<div class="account">
    <nav class='animated bounceInDown nav'>
        <ul>
            <li><a>
                    <div id="nameFormButton"><span class="t1">User Name: </span>
                        <span id="viewName">{{ $user->name }}</span>
    </div></a></li>
            <div id="nameForm">
                <div class="group">
                    <input type="text" required id="newName">
                    <label>Your new name</label>
                </div>
                <div><button class="litel" id="changeNameButton">Change name</button></div><br>
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
                <div><button class="litel" id="changeMailButton">Change mail</button></div><br>
            </div>            
            <li><a>
                    <div><span class="t1">Role:</span>
        {{ $user->role }}
    </div></a></li>
            <li class='sub-menu'>
    @if($user->role === 'user')
        <a href="#">
                Request for a teacher role
        </a>
    @endif
                </li>
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

@endsection

