@extends('layouts.layout_train')
{{--@extends('layouts.layout_main')--}}

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
    <form action="../test/{{$task->id}}" method="post">
        <textarea name="editor">
            @if(isset($userCode))
                {{$userCode}}
            @else
                {{$task->task_view}}
            @endif
        </textarea>
        <div id="editor"></div>
        <input type="submit" value="Check solution" name="test" id="btn">
        @if($task->id >1)
            <a href="../prew/{{$task->id}}" style="color: #fff;">Prev</a>
        @endif
        @if($task->id < (\App\Task::all()->count()))
            <a href="../next/{{$task->id}}" style="color: #fff;">Next</a>
        @endif
    </form>
    @if(isset($userCode))
        <p>{{$result}}</p>
    @endif
@endsection


