@extends('layouts.layout_admin')
@section('sidebar')
    <nav class='animated bounceInDown nav'>
        @foreach($tasklists as $tasklist)
            <ul>
                <li class='sub-menu'>
                    <a id="to-sort" href='#settings'>
                        <div class='fa fa-user'></div>
                        {{$tasklist->name}}
                        <div class='fa fa-caret-down right'></div>
                    </a>
                    <ul>
                        <li>
                            <a href='#'>
                                <form action="{{ action('TasklistController@addTask') }}" method="POST">
                                    {{csrf_field()}}
                                    <div class="group">
                                        <input type="text" required name="task_id">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Task id</label>
                                        <input type="hidden" name="tasklist_id" value="{{ $tasklist->id }}">
                                        <br>
                                        <input class="litel" type="submit" value="Добавить задачу">
                                    </div>
                                </form>
                            </a>
                        </li>
                    </ul>
                        <ul id="sortable-row">
                            <form action="" name="frmQA"  class="sort_form">
                                <input type = "hidden" name="row_order" id="row_order">
                            @foreach($tasklist->tasks as $task)
                                <li id="{{$tasklist->id}}:{{$task->id}}">
                                    <a href='#'>
                                        {{$task->task_desc}}
                                    </a>
                                </li>
                            @endforeach
                                <input id="{{$tasklist->id}}" type="submit" class="btnSave" name="submit"  value="Save order" onClick="saveOrder(this.id);" />
                            </form>
                        </ul>
                </li>
            </ul>
        @endforeach
        <ul>
            <li class='sub-menu'>
                <a href='#settings'>
                    <div class='fa fa-user'></div>
                    Создать новый задачник
                    <div class='fa fa-caret-down right'></div>
                </a>
                <ul>
                    <li>
                        <form action="{{ action('TasklistController@create') }}" method="POST">
                            {{csrf_field()}}
                            <input type="text" required name="tasklistName">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>New tasklist</label>
                            <br>
                            <input class="litel" type="submit" value="Создать задачник">
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <script>

            $( "form.sort_form" ).sortable();

        function saveOrder() {
            var selectedLanguage = [];
            $('.sub-menu').find('form.sort_form li').each(function() {
                selectedLanguage.push($(this).attr("id"));
            });
            document.getElementById("row_order").value = selectedLanguage;
        }

    </script>
@endsection



