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
                                        <input id="tasklist_id" type="hidden" name="tasklist_id" value="{{ $tasklist->id }}">
                                        <br>
                                        <input class="litel" type="submit" value="Добавить задачу">
                                    </div>
                                </form>
                            </a>
                        </li>
                    </ul>
                    <ul id="sortable-row">
                        @foreach($tasklist->tasks()->orderBy('order_id')->get() as $task)
                            <li id="{{$tasklist->id}}:{{$task->id}}">
                                <a href='#'>
                                    {{$task->task_desc}}
                                </a>
                            </li>
                        @endforeach
                        <input id="{{ $tasklist->id }}" type="submit" class="btnSave" name="submit" value="Save Order" onClick="saveOrder(this.id);" />
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
        $("ul#sortable-row").sortable();
        function saveOrder(id) {
            var task_list_order = [];
            $('.sub-menu').find('ul#sortable-row li').each(function() {
                if($(this).attr("id").slice(':')[0] == id){
                    task_list_order.push($(this).attr("id"));
                }
            });
            var order = [];
            for(var prop in task_list_order){
                order.push(task_list_order[prop].slice(':')[2]);
            }
            order = order.join();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{ route('taskListsStore') }}',
                cache: false,
                type: 'POST',
                data: {
                    'id' : id,
                    'order' : order
                },
                success: function(){
                    window.location = "{{route('tasklists')}}";
                }
            })
        }
    </script>
@endsection