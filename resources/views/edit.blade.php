@extends('layouts.layout_main')

@section('sidebar')

    <ul>
        <li style="padding: 0px;  margin: 30px">
            @foreach($tasks as $task)

                <div style="margin: 20px" class="task_left">
                    <span class="task_level">{{$task->user->name}}</span>
                    <a href="train/{{$task->id}}" class="task_name">{{$task->task_desc}}</a><br>
                    <div class="task_tag"><a href="#">{{$task->theme}}</a></div>
                    <a style="position: relative; float: right" class="a1" href="editTask/{{$task->id}}">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        update
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
