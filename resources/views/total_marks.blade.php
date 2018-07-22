@extends('layouts.layout_mark')

@section('sidebar')
    <table class="simple-little-table">
        <tr>
            <th style="font-size: 30px">
                {{$group->name}}
            </th>
        </tr>
        <tr>
            <th>Users/Moduls</th>
            @foreach($tasklists as $tasklist)
            <th>{{$tasklist->name}}</th>
            @endforeach
        </tr>
        @foreach($array as $user => $moduls)
            <tr>
                <td>{{$user}}</td>
                @foreach($moduls as $user => $rate)
                <td>
                    @foreach($rate as $task)
                        solved task:{{$task->id}}<br>
                    @endforeach
                </td>
                @endforeach
            </tr>
        @endforeach
    </table>
@endsection