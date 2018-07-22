@extends('layouts.layout_admin')
@section('sidebar')
    <nav class='animated bounceInDown nav'>
        @if ($error)
            <p class="t1" style="color: red">{{ $error }}</p>
        @endif
        @foreach($groups as $group)
        <ul>
            <li class='sub-menu'>
                <a href='#settings' id="{{$group->id}}" onclick="getGroupId(this.id)">
                    <div class='fa fa-users'></div>
                    {{$group->name}}
                    <a style="all: unset" href="/deleteGroup/{{$group->id}}">
                        <i class="fa fa-trash delete" aria-hidden="true"></i>
                    </a>
                </a>
                <ul style="display: inline-flex">
                    <li>
                        <a style="width: 325px">
                            <p>Add student to the group:</p>
                            <form action="{{ action('GroupController@addUser') }}" method="POST">
                                {{csrf_field()}}
                                <div class="group">
                                    <input type="text" required name="user_email" style="border-radius: 5px; margin-left: 5px">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label style="margin-left: 5px">Student login</label>
                                    <input type="hidden" name="group_id" value="{{ $group->id }}">
                                    <br>
                                    <input class="litel" type="submit" value="Add student">
                                    <input class="litel" name="delete" type="submit" value="Delete student">
                                </div>
                            </form>
                        </a>
                    </li>
                    <li style="position: relative">
                        <a style="width: 242px; display: block;">
                            <p>Assign module to the group:</p>
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
                                    <input class="litel" type="submit" value="Assign">
                                </div>
                            </form>
                        </a>
                    </li>
                    <li style="position: relative">
                        <a style="width: 242px; display: block;">
                            @if(count($group->tasklists()->get()) == 0)
                                <p>There are no modules assigned to this group yet</p>
                            @else
                            <p>Delete module from the group:</p>
                            <form action="{{ action('GroupController@deleteTasklist') }}" method="POST">
                                {{csrf_field()}}
                                <div class="group">
                                        <select name="delete_tasklist" style="width: 150px; height: 32px; font-size: 16px; border-radius: 5px;">
                                            @foreach($group->tasklists()->get() as $item)
                                            <option value="{{ $item->id }}" style="font-size: 16px">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <input type="hidden" name="group_id" value="{{ $group->id }}">
                                        <br>
                                        <input class="litel" type="submit" name="delete" value="Delete">
                                </div>
                            </form>
                            @endif
                        </a>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a href='/total-marks/{{$group->id}}'>
                            <div class='fa fa-eye'></div>
                            Посмотреть успеваемость
                        </a>
                    </li>
                    @foreach($group->users as $user)
                    <li>
                        <a href='#'>
                            {{$user->name}}
                        </a>
                    </li>
                    @endforeach
                </ul>
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



