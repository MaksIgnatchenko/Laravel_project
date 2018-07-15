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
                    //editor.setValue(data.task_view);
                    //sidebar.style.display = 'block';
                    taskDescription.innerHTML = data.task_desc;
                    //editor.setValue("the new text here");
//                    editor.session.setValue("the new text here");
                     textCode.innerHTML = data.task_view;

                    //editorDiv.innerHTML = data.task_view;
                     console.log(editor);

                },
                error :function(err) {

                }
            })
        }
    </script>
    {{--<script src="{{asset('js/src/ace.js')}}" type="text/javascript" charset="utf-8"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.3.3/ace.js"></script>--}}
@endsection

