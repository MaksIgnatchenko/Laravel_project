@extends('layouts.layout_admin')
@section('sidebar')
    <nav class='animated bounceInDown nav'>
        @foreach($groups as $group)
        <ul>
            <li class='sub-menu'>
                <a href='#settings'>
                    <div class='fa fa-user'></div>
                    {{$group->name}}
                    <div class='fa fa-caret-down right'></div>
                </a>
                @foreach($group->users as $username)
                <ul>
                    <li>
                        <a href='#'>
                            {{$username->name}}
                        </a>
                    </li>
                </ul>
                @endforeach
            </li>
        </ul>
        @endforeach
    </nav>
@endsection



