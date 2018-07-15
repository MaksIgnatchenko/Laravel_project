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
                    <div class='fa fa-users'></div>
                    {{$group->name}}
                    <a style="all: unset" href="/deleteGroup/{{$group->id}}">
                        <i class="fa fa-trash delete" aria-hidden="true"></i>
                    </a>
                </a>
                <ul style="display: inline-flex">
                    <li style="width: 50%;">
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
                    <li style="width: 60%">
                        <a href='#'>
                            <form action="{{ action('GroupController@addTasklist') }}" method="POST">
                                {{csrf_field()}}
                                <div class="group">
                                    <select name="choose_tasklist" style="width: 150px; height: 32px; font-size: 16px; border-radius: 5px;">
                                        @foreach($tasklists as $tasklist)
                                            <option value="{{ $tasklist->id }}" style="font-size: 16px">{{ $tasklist->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <input type="hidden" name="group_id" value="{{ $group->id }}">
                                    <br>
                                    <input class="litel" type="submit" value="Assign tasklist to group">
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
                    <div class='fa fa-plus'></div>
                        Создать новую группу
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



