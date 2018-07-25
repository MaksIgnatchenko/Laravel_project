@extends('layouts.layout_main')
{{--/** @var PaginationDto $dto*/--}}
@section('sidebar')

    <nav class='animated bounceInDown nav'>
        @foreach($user as $specific_user)
        <span style="color: #fff; font-size: 20px">
            {{$specific_user->name}}
        </span>
        <div class="profile_photo" style="float: right;">
            <img src="/images/avatars/big/{{$specific_user->big_avatar}}">
        </div>
        @endforeach
    </nav>

@endsection
