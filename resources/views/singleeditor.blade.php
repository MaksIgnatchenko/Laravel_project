@extends('layouts.layout_create')

@section('body')
    <form action="check" method="post">
        <legend>description_task</legend>
        <textarea  class="t" name="task_desc"  id="1" cols="80" rows="10">{{$task->task_desc}}</textarea>
        <br><br>
        <legend>task_test_code</legend>
        <textarea class="t" name="check_code" id="2" cols="80" rows="20">{{$task->check_code}}</textarea>
        <br><br>
        <legend>preview_task</legend>
        <textarea class="t" name="task_view" id="3" cols="80" rows="10">{{$task->task_view}}</textarea>
        <br>
        <legend>chek_params</legend>
        <textarea class="t" name="editor" id="3" cols="80" rows="10" required></textarea>
        <br>
        <input type="submit" name="check" value="проверить" title="Отправить данные формы">
        <input type="submit" name="create"  value="update" title="Отправить данные формы">
    </form>
    <div style="position: relative; left: 50%; top: 40px" class="flip">
        <a href="editTask/{{$task->id}}">
            <div class="front">UPDATE</div>
            <div class="back">UPDATE</div>
        </a>
    </div>
    @if(isset($cmd))
        <div style="position: absolute; top: 100px; left: 50%">
            <h3>fix if you need it</h3>
            <legend>your code</legend>
            <textarea class="t" name="allcode" id="3" cols="100" rows="20">{{$cmd}}</textarea>
            <br>
        </div>
        <div style="position: absolute; top: 50%; left: 50%">
            <legend>result</legend>
            <textarea class="t" name="" id="3" cols="80" rows="10">{{$result}}</textarea>
            <br>
        </div>
    @endif

@endsection