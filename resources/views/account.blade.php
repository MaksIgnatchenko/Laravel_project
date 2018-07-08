@extends('layouts.layout_main')
{{--/** @var PaginationDto $dto*/--}}
@section('sidebar')
<div class="account">
    <div>User Name:
        {{ $user->name }}
    </div>
    <div>E-mail:
        {{ $user->email }}
    </div>
    <div>Role:
        {{ $user->role }}
    </div>
    @if($user->role === 'user')
        <a href="#">
            <div class="buttons">
                request for a teacher role
            </div>
        </a>
    @endif
    <a href="#" id="changePasswordForm">
        <div class="buttons">
        change password
        </div>
    </a>
    <div id="passForm">
        {{csrf_field()}}
        <div>Current password <input type="password" name="currentPass" id="currentPass" required></div>
        <div>New password <input type="password" name="newPass" id="newPass" required></div>
        <div>Repeat new password <input type="password" name="newPass2" id="newPass2" required></div>
        <div><button id="changePassButton">Change password</button></div>
    </div>
</div>


@endsection

