@extends('welcome')
@section('sidebar1')
@endsection
@section('content')
    <form action="createtask" method="post">
        <legend>description_task</legend>
        <textarea class="t" name="description"  id="1" cols="80" rows="10">{{$task->description}}</textarea>
        <br><br>
        <legend>task_test_code</legend>
                <textarea class="t" name="test" id="2" cols="80" rows="20">{{$task->test}}</textarea>
        <br><br>
        <legend>preview_task</legend>
                 <textarea class="t" name="preview" id="3" cols="80" rows="10">{{$task->preview}}</textarea>
            <br>
            <input type="submit"  value="Отправить" title="Отправить данные формы">
    </form>
@endsection