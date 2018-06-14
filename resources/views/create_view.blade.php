@extends('layouts.layout_create')

@section('head')
    <h1>Task creator</h1>
@endsection

@section('body')

    <form action="/distribute/{{ $task->id }}" method="post">
        <legend>Описание задачи</legend>
        <textarea class="t" name="task_desc" id="1" cols="80" rows="10">{{$task->task_desc}}</textarea>
        <br><br>
        <legend>Код, проверяющий пользовательский код</legend>
        <textarea class="t" name="check_code" id="2" cols="80" rows="20">{{$task->check_code}}</textarea>
        <br><br>
        <legend>Заготовка функции для пользователя</legend>
        <textarea class="t" name="task_view" id="3" cols="80" rows="10">{{$task->task_view}}</textarea>
        <br>
        <legend>Пример правильно выполненного задания</legend>
        <textarea class="t" name="editor" id="3" cols="80" rows="10" required>
        @if (isset($exam->code))
                {{ $exam->code }}
            @endif
    </textarea>
        <br>
        <input type="submit" name="action" value="check" title="Отправить данные формы">
        @if(isset($update))
            <input type="submit" name="action" value="update" title="Отправить данные формы">
        @else
            <input type="submit" name="action" value="create" title="Отправить данные формы">
        @endif
    </form>

    @if(isset($exam))
        <div style="position: absolute; top: 100px; left: 50%">
            <h3>fix if you need it</h3>
            <legend>your code</legend>
            <textarea class="t" name="allcode" id="3" cols="100" rows="20">{{$exam->code}}</textarea>
            <br>
        </div>
        <div style="position: absolute; top: 50%; left: 50%">
            <legend>result</legend>
            <textarea class="t" name="" id="3" cols="80" rows="10">
                @if($exam->isPassed)
                    Задача решена правильно
                @else
                    Задача решена неверно
                @endif
                @if($exam->error)
                Синтаксическая ошибка {{ $exam->error }}
                @endif
            </textarea>
            <br>
        </div>
    @endif
@endsection