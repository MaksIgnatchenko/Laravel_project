@extends('layouts.layout_main')
{{--/** @var PaginationDto $dto*/--}}
@section('content')
<div class='sidebar'>
    <div>User Name:
        {{ $user->name }}
    </div>
    <div>E-mail:
        {{ $user->email }}
    </div>
    <div>Role:
        {{ $user->role }}
        @if(!($user->role == 'admin' || $user->role == 'teacher'))
        <a href="#">request for a teacher role</a>
            @endif
    </div>
    <div>
        <a href="#">Change password</a>
    </div>
</div>
@endsection

@section('sidebar')

@endsection
