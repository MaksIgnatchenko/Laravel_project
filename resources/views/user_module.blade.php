@extends('layouts.layout_main')

@section('content')
    <div class="task">
        <h5>Choose your task:</h5>
        <nav class='animated bounceInDown nav'>
            @foreach($tasklist as $task)
                <ul>
                    <li class="sub-menu">
                        <a id="{{ $task->id }}" onclick="showTask(this.id)">{{$task->task_desc}}</a>
                    </li>
                    <br>
                </ul>
            @endforeach
        </nav>
    </div>
@endsection

@section('sidebar2')
    <div id="taskDescription">
    </div>
    <div class="solution">
        <p>Solution:</p>
    </div>
    <form action="" method="post">
        {{csrf_field()}}
        <textarea name="editor" id="textCode"></textarea>
        <div id="editor"></div>
        <br>
        <input class="litel" type="submit" value="Check solution" name="test" id="btn">
        <br><br>
    </form>
    <script>
        function showTask(id) {
            var sidebar = document.getElementById('sidebar');
            var taskDescription = document.getElementById('taskDescription');
            var textCode = document.getElementById('textCode');
            var editor = document.getElementById('editor');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': token
                },
                url: '/show-task',
                cache: false,
                type: 'POST',
                data: {
                    'id' : id
                },
                success: function (data, textStatus, xhr) {
                    var editor = ace.edit('editor');
                    $('#sidebar2').show(1500);
                    editor.setValue(data.task_view);
                    taskDescription.innerHTML = data.task_desc;
                },
                error :function(err) {

                }
            })
        }
    </script>
@endsection

