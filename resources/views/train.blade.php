@extends('layouts.layout_train')

@section('left-content')
    <div class="back_to_task_list">
        <a href="/main">
            <img src="{{asset('images/arrow.png')}}" alt="">
        </a>
        <a href="/main" class="to_tasks">
            К списку задач
        </a>
    </div>
    <div class="task_title">
        <span class="task_level">{{$task->difficulty}} lvl</span>
        <h4 class="task_name">{{$task->short_desc}}</h4>
    </div>
    <div class="task_description">
        <p class="desc">Description:</p>
        <p class="task_desc">{{$task->task_desc}}</p>
    </div>
@endsection

@section('right-content')
    <select>
        <option value="PHP">PHP</option>
        <option value="Javascript">Javascript</option>
        <option value="Python">Python</option>
    </select>
    <div class="solution">
        <p>Solution:</p>
    </div>
    <form action="../test/@if(isset($taskResult->task_id)){{$taskResult->task_id}}@else{{$task->id}}@endif" method="post">
        {{csrf_field()}}
    <textarea name="editor">@if(isset($taskResult->userCode)){{ $taskResult->userCode }}@else{{ $task->task_view }}@endif</textarea>
        <div id="editor"></div>
        <input type="submit" style="margin: 10px; margin-left: 300px" name="test" class="litel" id="buttonCheck" id="btn" value="Check solution">
        <br><br>
        @isset($taskResult)
            @if($taskResult->isPassed)
                <p>Вы решили правильно</p>
            @else
                <p>Решение неверно!</p>
                    @isset($taskResult->result)
                <p>{{ $taskResult->result }}</p>
                    @endisset
            @endif
        @endisset
    </form>
    <div class="content_detail__pagination cdp" actpage="{{$actpage}}">
        <a href="{{$path}}?page={{$actpage-1}}" class="cdp_i">prev</a>

        @for($i = 1; $i <= $totalPageCount; $i++)
            <a href="{{$path}}?page={{$i}}" class="cdp_i">{{$i}}</a>
        @endfor

        <a href="{{$path}}?page={{$actpage+1}}" class="cdp_i">next</a>
    </div>

@endsection


