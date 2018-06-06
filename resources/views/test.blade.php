@extends('welcome')
@section('sidebar')
@endsection
@section('content')
    <div id="one">Это тот самый элемент которой не видит JS</div>
<form action="../foo/{{$task->id}}" method="post">

        <legend>php</legend>
        <p class="t1">{{$task->description}}</p>
        <textarea id="example_1" cols="80" rows="20" name="code">
            @if(isset($post))
               {{$post}}
            @else
                {{$task->preview}}
            @endif
        </textarea>
        <br>
        <input type="submit"  value="Отправить" title="Отправить данные формы">
        <a href="../test/{{$task->id+1}}" class="t1">следующее</a>

    @if(isset($post))
        <p class="t1">{{$post}}</p>
    @endif
</form>
    {{--<ul>--}}
        {{--@foreach ($tasks as $task)--}}
             {{--@foreach ($task as $key => $value)--}}
                {{--@empty(!$value)--}}
                    {{--<li><span class="t1">{{$key}}</span> : {{ $value }}</li>--}}
                {{--@endempty--}}
            {{--@endforeach--}}
        {{--<br>--}}
        {{--@endforeach--}}
    {{--</ul>--}}
@endsection
<script>
    var area = document.getElementById("one");
    area.onclick = function (){
        this.style.background = 'green';
    }

</script>

