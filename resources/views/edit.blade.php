@extends('layouts.layout_main')

@section('sidebar')

    <h1>Task editor</h1>

    <ul>
        <li>
            @foreach($tasks as $task)

                <div class="task_left">
                    <span class="task_level">{{$task->user->name}}</span>
                    <a href="train/{{$task->id}}" class="task_name">{{$task->task_desc}}</a><br>
                    <div class="task_tag"><a href="#">{{$task->theme}}</a></div>
                </div>

                    <div style="position: relative; top: 45px" class="flip">
                        <a href="editTask/{{$task->id}}" target="_blank">
                            <div class="front">EDIT</div>
                            <div class="back">EDIT</div>
                        </a>
                    </div>

                <hr>
            @endforeach
        </li>
    </ul>

    <div class="content_detail__pagination cdp" actpage="{{$actpage}}">
        <a href="{{$path}}?page={{$actpage-1}}" class="cdp_i">prev</a>

        @for($i = 1; $i <= $totalPageCount; $i++)
            <a href="{{$path}}?page={{$i}}" class="cdp_i">{{$i}}</a>
        @endfor

        <a href="{{$path}}?page={{$actpage+1}}" class="cdp_i">next</a>
    </div>
@endsection