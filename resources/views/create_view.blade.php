@extends('layouts.layout_create')

@section('head')
    <h1>Task creator</h1>
@endsection

@section('body')

    <form action="/distribute/{{$task->id}}" method="post">
        {{csrf_field()}}
        <legend>Выберите язык программирования</legend>
        <select name="language" id="">
            <option value="php" @if($task->language === 'php') selected @endif>PHP</option>
            <option value="python" @if($task->language === 'python') selected @endif>Python</option>
            <option value="javascript" @if($task->language === 'javascript') selected @endif>JavaScript</option>
        </select>
        <legend>Описание задачи</legend>
                @if(isset($example))
                <textarea class="t" name="task_example" id="1" cols="80" rows="10">{{$task->task_desc}}</textarea>
                @else
                <textarea class="t" name="task_desc" id="1" cols="80" rows="10">{{$task->task_desc}}</textarea>
                @endif
        <br><br>
        <legend>Код, проверяющий пользовательский код</legend>
        <textarea class="t" name="check_code" id="2" cols="80" rows="20">{{$task->check_code}}</textarea>
        <br><br>
        <legend>Заготовка функции для пользователя</legend>
        <textarea class="t" name="task_view" id="3" cols="80" rows="10">{{$task->task_view}}</textarea>
        <br>
        <legend>Пример правильно выполненного задания</legend>
        <textarea class="t" required name="editor" id="3" cols="80" rows="10">
        @if (isset($taskResult->fullCode))
                {{ $taskResult->userCode }}
            @endif
    </textarea>
        <br>
        <p style="position: relative; float: left; top: 40px; left: 60px" class="a1">
            <input style="opacity: 0;" class="a1" type="submit" name="action" value="check" title="Отправить данные формы">
            <span></span>
            <span></span>
            <span></span>
            check
        </p>
        @if(isset($update))
            <p style="position: relative; float: left; top: 40px; left: 90px" class="a1">
                <input style="opacity: 0;" class="a1" type="submit" name="action" value="update" title="Отправить данные формы">
                <span></span>
                <span></span>
                <span></span>
                update
            </p>
        @else
            <p style="position: relative;float: left; top: 40px; left: 90px" class="a1">
                <input style="opacity: 0;" class="a1" type="submit" name="action" value="create" title="Отправить данные формы">
                <span></span>
                <span></span>
                <span></span>
                create
            </p>
        @endif
    </form>
    @if(isset($taskResult))
        <div style="position: absolute; top: 100px; left: 50%">
            <h3>fix if you need it</h3>
            <legend>your code</legend>
            <textarea class="t" name="allcode" id="3" cols="100" rows="20">{{$taskResult->fullCode}}</textarea>
            <br>
        </div>

        <div style="position: absolute; top: 60%; left: 50%">
            <legend>result</legend>
            <textarea class="t" name="" id="3" cols="80" rows="10">

               @isset($taskResult)
                    @if($taskResult->isPassed)
                        Вы решили правильно
                    @else
                        Решение неверно!
                        @isset($taskResult->result)
                            {{ $taskResult->result }}
                        @endisset
                    @endif
                @endisset

            </textarea>
            <br>
        </div>
    @endif
@endsection

@section('body')
@endsection