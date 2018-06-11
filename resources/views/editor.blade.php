@extends('layouts.layout_main')
@section('sidebar')

    <form action="/check/{{$task->id}}" method="post">
        <legend class="t1">description_task</legend>
        <textarea  class="t" name="task_desc"  id="1" cols="80" rows="10">{{$task->task_desc}}</textarea>
        <br><br>
        <legend class="t1">task_test_code</legend>
        <textarea class="t" name="check_code" id="2" cols="80" rows="20">{{$task->check_code}}</textarea>
        <br><br>
        <legend class="t1">preview_task</legend>
        <textarea class="t" name="task_view" id="3" cols="80" rows="10">{{$task->task_view}}</textarea>
        <br>
        <legend class="t1">put check code here</legend>
        <textarea class="t" name="params" id="3" cols="80" rows="10" required></textarea>
        <br>
        <input type="submit" name="check" value="проверить" title="Отправить данные формы">
        <input type="submit" name="create"  value="update" title="Отправить данные формы">
    </form>

    @if(isset($checkCode))
        <div style="position: absolute; top: 0; left: 40%">
            <h3>fix if you need it</h3>
            <legend>your code</legend>
            <textarea class="t" name="allcode" id="3" cols="100" rows="20">{{$checkCode}}</textarea>
            <br>
        </div>
        <div style="position: absolute; top: 40%; left: 40%">
            <legend>result</legend>
            <textarea class="t" name="" id="3" cols="80" rows="10">{{$result}}</textarea>
            <br>
        </div>
    @endif
@endsection
