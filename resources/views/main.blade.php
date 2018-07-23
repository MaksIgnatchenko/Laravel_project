@extends('layouts.layout_main')
{{--/** @var PaginationDto $dto*/--}}
@section('content')
    <div class="task">
            <div class="sort">
                <span>Sort By:</span>
                <select class="sort_item" name="sort_item">
                    <option value="Newest">Newest</option>
                    <option value="Oldest">Oldest</option>
                    <option value="Easiest">Easiest</option>
                    <option value="Hardest">Hardest</option>
                    <option value="Recently published">Recently published</option>
                </select>
            </div>
            <div class="lang">
                <span>Language:</span>
                <select class="language" name="language">
                    <option value="Languages">Languages</option>
                    <option value="PHP">PHP</option>
                    <option value="Javascript">Javascript</option>
                    <option value="Python">Python</option>
                </select>
            </div>
            <div class="diffic">
                <span>Difficulty:</span>
                <select class="level" name="difficulty">
                    <option class="defalut">Difficulties</option>
                    @foreach($difficulties as $difficulty)
                    <option value="{{$difficulty->difficulty}}">{{$difficulty->difficulty}}</option>
                    @endforeach
                </select>
            </div>
        <hr>
        <div class="tags">
            <span>Tags:</span>
            <ul class="tags_items">
                <li class="tags_item"><a href="/main/">All tasks</a></li>
                @foreach($tagslist as $taglist)
                <li class="tags_item"><a href="/main/{{$taglist->theme}}">{{$taglist->theme}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>

@endsection

@section('sidebar')
    <h5>Task list</h5>
    <ul>
        @foreach($dto->getTasks() as $task)
        <li>
                <div class="task_left">
                    <span class="task_level">{{$task->difficulty}} level</span>
                    <span class="task_level">{{$task->user->name}}</span>
                    <a href="/train/{{$task->id}}"  name="main" class="task_name">{{$task->short_desc}}</a><br>
                    <div class="task_tag"><a href="#">{{$task->theme}}</a></div>
                </div>
                <div class="task_right">
                    <img src="/images/php-icon.jpg">
                </div>
                <hr>
        </li>
        @endforeach
    </ul>

    <div class="content_detail__pagination cdp" actpage="{{$dto->getActpage()}}">
        <a href="{{$dto->getPath()}}?page={{$dto->getActPage() - 1}}" class="cdp_i">prev</a>

        @for($i = 1; $i <= $dto->getTotalPageCount(); $i++)
            <a href="{{$dto->getPath()}}?page={{$i}}" class="cdp_i">{{$i}}</a>
        @endfor

        <a href="{{$dto->getPath()}}?page={{$dto->getActPage()+1}}" class="cdp_i">next</a>
    </div>

    <script>

        var url = 'http://sourceplanet/main';
        var parameter = '';
        var name = '';

        $(".task select").change(function(){
            name = $(this).attr('name');
            console.log(name);
            name = 'difficulty';
            parameter = $(this).val();
            window.location.href = url + '/' + parameter;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{ route('get') }}',
                cache: false,
                type: 'POST',
                data: {
                    'name' : name
                },
                success: function(data){
                    console.log(data);
                }
            });
        });

    </script>

@endsection
