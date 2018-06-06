@extends('layouts.layout_train')

@section('left-content')
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
            @if(isset($post))
                {{$post}}
            @else
                {{$task->task_view}}
            @endif
        </textarea>
        <div id="editor"></div>
        <input type="submit" value="Check solution" name="test" id="btn">
    </form>
@endsection


