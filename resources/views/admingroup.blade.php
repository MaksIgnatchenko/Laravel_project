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
                            <a style="width: 225px">
                                <p>Add student to the group:</p><br>
                                <form autocomplete="off" action="{{ action('GroupController@addUser') }}" method="POST">
                                    {{csrf_field()}}
                                    <div class="group">


                                        <div class="autocomplete">
                                            <input id="user_email" class="myInput" type="text" required name="user_email" placeholder="User login" style="border-radius: 5px;">
                                        </div>
                                        <script type="text/javascript" src="{{asset('js/autocomplete.js')}}"></script>


                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label style="margin-left: 5px"></label>
                                        <input type="hidden" name="group_id" value="{{ $group->id }}">
                                        <br>
                                        <input id="add_student" class="litel" type="submit" value="Add student">
                                        <input class="litel" name="delete" type="submit" value="Delete student">
                                    </div>
                                </form>
                            </a>
                        </li>
                        <li style="position: relative; right: 15px ">
                            <a style="width: 180px; display: block;">
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
                        <li style="position: relative; right: 30px">
                            <a style="width: 225px; display: block;">
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
                        @if(count($group->users()->where('role', 'user')->get()) > 0)
                        <li class="sub-menu" style="width: 250px">
                            <a href='#settings' style="background: rgba(41, 107, 164, 0.73);">
                                <div class='fa fa-users'></div>
                                Students list
                            </a>
                            <ul>
                                @foreach($group->users()->where('role', 'user')->get() as $user)
                                    <li>
                                        <a href='#'>
                                            {{$user->name}}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        @if(count($group->tasklists()->get()) != 0)
                            <li style="width: 250px">
                                <a href='/total-marks/{{$group->id}}'>
                                    <div class='fa fa-eye'></div>
                                    View progress
                                </a>
                            </li>
                        @endif
                            @else
                            <p style="color: #fff; font-size: 20px;">There are no users in the group</p>
                        @endif
                    </ul>
                </li>
            </ul>
        @endforeach
        <ul>
            <li class='sub-menu'>
                <a href='#settings'>
                    <div class='fa fa-plus'></div>
                    Create a new group
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

