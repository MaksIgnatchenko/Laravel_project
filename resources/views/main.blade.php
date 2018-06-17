@extends('layouts.layout_main')
{{--/** @var PaginationDto $dto*/--}}
@section('content')
    <div class="task">
        <h5>Choose your task:</h5>
        <div class="sort">
            <span>Sort By:</span>
            <select class="sort_item" name="sort_item">
                <option value="Newest">Newest</option>
                <option value="Oldes">Oldes</option>
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
            <select class="level" name="level">
                <option>Difficulties</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
            </select>
        </div>
        <hr>
        <div class="tags">
            <span>Tags:</span>
            <ul class="tags_items">
                <li class="tags_item"><a href="">Algorithms</a></li>
                <li class="tags_item"><a href="">Fundamentals</a></li>
                <li class="tags_item"><a href="">Arrays</a></li>
                <li class="tags_item"><a href="">Strings</a></li>
                <li class="tags_item"><a href="">Numbers</a></li>
                <li class="tags_item"><a href="">Logic</a></li>
                <li class="tags_item"><a href="">Algebra</a></li>
                <li class="tags_item"><a href="">Geometry</a></li>
                <li class="tags_item"><a href="">Mathematics</a></li>
            </ul>
        </div>
    </div>
@endsection

@section('sidebar')
    <h5>Task list</h5>
    <ul>
        <li>
            @foreach($dto->getTasks() as $task)
                <div class="task_left">
                    <span class="task_level">{{$task->difficulty}} level</span>
                    <span class="task_level">{{$task->user->name}}</span>
                    <a href="train/{{$task->id}}"  name="main" class="task_name">{{$task->short_desc}}</a><br>
                    <div class="task_tag"><a href="#">{{$task->theme}}</a></div>
                </div>
                <div class="task_right">
                    <img src="images/php-icon.jpg">
                </div>
                <hr>
            @endforeach
        </li>
    </ul>

    <div class="content_detail__pagination cdp" actpage="{{$dto->getActpage()}}">
        <a href="{{$dto->getPath()}}?page={{$dto->getActPage() - 1}}" class="cdp_i">prev</a>

        @for($i = 1; $i <= $dto->getTotalPageCount(); $i++)
            <a href="{{$dto->getPath()}}?page={{$i}}" class="cdp_i">{{$i}}</a>
        @endfor

        <a href="{{$dto->getPath()}}?page={{$dto->getActPage()+1}}" class="cdp_i">next</a>
    </div>

@endsection
