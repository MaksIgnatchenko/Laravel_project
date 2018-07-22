@extends('layouts.layout_mark')

@section('sidebar')
    <table class="simple-little-table">
        <tr>
            <th style="font-size: 30px;text-shadow: 2px 2px 0px #b5b5b5;">
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
                <td style="font-weight: bold">{{$user}}</td>
                @foreach($moduls as $user => $rate)
                    @if(count($rate))
                <td style="color: #187a54">
                    @foreach($rate as $task)
                        solved task: {{$task->id}}<br><br>
                    @endforeach
                </td>
                        @else
                        <td style="color: #bd5a35">
                            no solutions yet
                        </td>
                    @endif
                @endforeach
            </tr>
        @endforeach
    </table>
@endsection