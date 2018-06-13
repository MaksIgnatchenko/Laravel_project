@extends('layouts.layout_create')
@section('head')
       <h1>task update</h1>
@endsection

@section('body')

    <form action="/editor/{{$task->id}}" method="post">
        <legend>Описание задачи</legend>
        <textarea class="t" name="task_desc"  cols="80" rows="10">{{$task->task_desc}}</textarea>
        <br><br>
        <legend>Код, проверяющий пользовательский код</legend>
        <textarea class="t" name="check_code" cols="80" rows="20">{{$task->check_code}}</textarea>
        <br><br>
        <legend>Заготовка функции для пользователя</legend>
        <textarea class="t" name="task_view"  cols="80" rows="10">{{$task->task_view}}</textarea>
        <br>
        <legend>Пример правильно выполненного задания</legend>
        <textarea class="t" name="editor"  cols="80" rows="10" required>
        @isset($userCode)
                {{ $userCode }}
            @endisset
    </textarea>
        <br>
        <input type="submit" name="action" value="checkin" title="Отправить данные формы">
        <input type="submit" name="action" value="update" title="Отправить данные формы">
    </form>

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