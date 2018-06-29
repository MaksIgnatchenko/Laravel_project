@extends('layouts.layout_admin')
@section('sidebar')
    <nav class='animated bounceInDown nav'>
        @foreach($tasklists as $tasklist)
            <ul>
                <li class='sub-menu'>
                    <a href='#settings'>
                        <div class='fa fa-user'></div>
                        {{$tasklist->name}}
                        <div class='fa fa-caret-down right'></div>
                    </a>
                    <ul>
                        <li>
                            <a href='#'>
                                <form action="{{ action('TasklistController@addTask') }}" method="POST">
                                    {{csrf_field()}}
                                    <div class="group">
                                        <input type="text" required name="task_id">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Task id</label>
                                        <input type="hidden" name="tasklist_id" value="{{ $tasklist->id }}">
                                        <br>
                                        <input class="litel" type="submit" value="Добавить задачу">
                                    </div>
                                </form>
                            </a>
                        </li>
                    </ul>
                    @foreach($tasklist->tasks as $task)
                        <ul>
                            <li>
                                <a href='#'>
                                    {{$task->short_desc}}
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
                    Создать новый задачник
                    <div class='fa fa-caret-down right'></div>
                </a>
                <ul>
                    <li>
                        <form action="{{ action('TasklistController@create') }}" method="POST">
                            {{csrf_field()}}
                            <input type="text" required name="tasklistName">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>New tasklist</label>
                            <br>
                            <input class="litel" type="submit" value="Создать задачник">
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
@endsection



