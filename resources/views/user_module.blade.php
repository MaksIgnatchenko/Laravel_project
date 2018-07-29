@extends('layouts.layout_main')

@section('content')
    <div class="task">
        <input  id="tasklist" type="hidden" name="_token" value="{{$tasklist}}">
        <h5>Choose your task:</h5>
        <nav class='animated bounceInDown nav'>
            @foreach($tasklist as $key=>$task)
                <ul>
                    <li class="sub-menu" style="background-color:rgba(0,0,0,0.73)">
                        <a id="{{ $task->id }}" onclick="showTask(this.id)">
                            {{$task->short_desc}}
                            <span id="{{ $task->id }}checkmark" class="checkmark"></span>
                        </a>
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
    {{csrf_field()}}

    <textarea name="editor" id="textCode"></textarea>
    <div id="editor"></div>
    <button  style="margin: 10px; margin-left: 300px" class="litel" id="buttonCheck" >Check solution</button>

    <br><br>
    <div id="syntaxError"></div>
    <div id="checkOk">
        <span>&#10004; Task is solved</span>
    </div>
    <div id="checkNo">
        <span>&#10008; The solution is wrong</span>
    </div>
    <script>
        var checkMarks = document.getElementsByClassName('checkmark');
        var sidebar = document.getElementById('sidebar');
        var taskDescription = document.getElementById('taskDescription');
        var textCode = document.getElementById('textCode');
        var editor = document.getElementById('editor');
        var buttonCheck = document.getElementById("buttonCheck");
        var task;
        var CheckOk = document.getElementById('checkOk');
        var CheckNo = document.getElementById('checkNo');
        var syntaxError = document.getElementById('syntaxError');
        var solutions = {{ json_encode($solutions) }}

        buttonCheck.addEventListener('click', checkSolution);
        CheckOk.addEventListener('click', hideCheckStatus);
        CheckNo.addEventListener('click', hideCheckStatus);
        syntaxError.addEventListener('click', hideCheckStatus);

        setCheckMarks();


        function checkSolution() {
            hideCheckStatus();
            var editor = ace.edit('editor');
            var userCode = editor.getValue();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': token
                },
                url: '/ajaxTest',
                cache: false,
                type: 'POST',
                data: {
                    'task' : task,
                    'editor' : userCode
                },
                success: function (data, textStatus, xhr) {
                    if (data.isPassed) {
                        checkOk.style.display = "block";
                        var checkMark = document.getElementById(data.task_id + "checkmark");
                        checkMark.innerHTML = "&#10004;";
                        checkMark.style.display = 'inline';
                        checkMark.style.color = 'green';

                             //pagination tasks//
                        var tasklist = $('#tasklist')[0].value
                        tasklist = JSON.parse(tasklist)
                        for(var i = 0; i < tasklist.length; i++){
                           if(tasklist[i].id == data.task_id){
                               var curentIndex = i;
                           }
                        }
                        var nextIndex = curentIndex + 1;
                        if(nextIndex < tasklist.length) {
                            setTimeout(showTaskInterval, 2000);
                            function showTaskInterval() {
                                showTask(tasklist[nextIndex].id)
                            }
                        }
                            //end pagination tasks//
                    } else {
                        if (data.error) {
                            syntaxError.innerHTML = data.error;
                            syntaxError.style.display = "block"
                        }
                        checkNo.style.display = "block";
                    }
                },
                error :function(err) {

                }
            })
        }

        function showTask(id) {
            hideCheckStatus();
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
                    task = data;
                    var editor = ace.edit('editor');
                    $('#sidebar2').show(1500,function(){
                        editor.setTheme("ace/theme/cobalt");
                    });
                    editor.setValue(data.task_view);
                    taskDescription.innerHTML = data.task_desc;
                    activeField(id);
                },
                error :function(err) {

                }
            })
        }

        function hideCheckStatus() {
            CheckOk.style.display = 'none';
            CheckNo.style.display = 'none';
            syntaxError.style.display = 'none';
        }

        function setCheckMarks () {
            for (var key in checkMarks) {
                var idName = checkMarks[key].id;
                var checkMark = document.getElementById(idName);
                if (solutions[key] == true) {
                    checkMark.innerHTML = "&#10004;";
                    checkMark.style.display = 'inline';
                    checkMark.style.color = 'green';
                } else {
                    checkMark.innerHTML = "&#10008;";
                    checkMark.style.display = 'inline';
                    checkMark.style.color = 'red';
                }
            }
        }

        function activeField(idElem) {
            var collection = $('.nav ul li a');
            for (let i = 0; i < collection.length; i++) {
                collection[i].style.backgroundColor = 'rgba(41, 107, 164, 0.73)';
            }
            for (let i = 0; i < collection.length; i++) {
                if (collection[i].id == idElem) {
                    collection[i].style.backgroundColor = 'rgba(88, 169, 195, 0.73)';
                    break;
                }
            }
        }
    </script>
@endsection

