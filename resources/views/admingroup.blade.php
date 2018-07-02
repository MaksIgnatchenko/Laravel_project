@extends('layouts.layout_admin')
@section('sidebar')
    <nav class='animated bounceInDown nav'>
        @if ($error)
            <p class="t1">{{ $error }}</p>
        @endif
        @foreach($groups as $group)
        <ul>
            <li class='sub-menu'>
                <a href='#settings'>
                    <div class='fa fa-user'></div>
                    {{$group->name}}
                    <div class='fa fa-caret-down right'></div>
                </a>
                <ul>
                    <li>
                        <a href='#'>
                            <form action="{{ action('GroupController@addUser') }}" method="POST">
                                {{csrf_field()}}
                                <div class="group">
                                    <input type="text" required name="user_email">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Student login</label>
                                    <input type="hidden" name="group_id" value="{{ $group->id }}">
                                    <br>
                                    <input class="litel" type="submit" value="Добавить ученика">
                                </div>
                            </form>
                        </a>
                    </li>
                </ul>
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
                            <input type="text" required name="groupName">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>New group</label>
                            <br>
                            <input class="litel" type="submit" value="Создать группу">
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
@endsection



