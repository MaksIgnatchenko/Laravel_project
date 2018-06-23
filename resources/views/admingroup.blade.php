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
                @foreach($group->users as $user)
                <ul>
                    <li>
                        <a href='#'>
                            {{$user->name}}
                        </a>
                    </li>
                </ul>
                @endforeach
            </li>
        </ul>
        @endforeach
        <ul>
            <li class='sub-menu'>
                <a href='#settings'>
                    <div class='fa fa-user'></div>
                        Создать новую группу
                    <div class='fa fa-caret-down right'></div>
                </a>
                <ul>
                    <li>
                        <form action="{{ action('GroupController@create') }}" method="POST">
                            {{csrf_field()}}
                            <input type="text" name="groupName">
                            <input type="submit" value="Создать группу">
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
@endsection



