@extends('layouts.layout_mark')

@section('sidebar')

    <table class="simple-little-table" >
        <tr>
            <th colspan="{{count($tasklists)+1}}"
                style="
                letter-spacing: 15px;
                text-align: center;
                background:-webkit-gradient(linear, left top, left bottom, from(#a6a6a6), to(#ffffff));
                font-size: 30px;
                color: #898e93;
                text-shadow: 2px 2px 0px #102c44; ">
                {{$group->name}}
            </th>
        </tr>
        <br>
        <tr>
            <th style="background: -webkit-gradient(linear, left top, left bottom, from(rgb(112, 147, 193)), to(rgb(238, 242, 248)));">
                Users/Moduls
            </th>
            @foreach($tasklists as $tasklist)
            <th>{{$tasklist->name}}</th>
            @endforeach
        </tr>
        @foreach($array as $user => $moduls)
            <tr>
                <td>{{$user}}</td>
                @foreach($moduls as $user => $rate)
                    @if(count($rate))
                        <td>
                        @foreach($rate as $task)
                                solved task: {{$task->id}}<br><br>
                        @endforeach
                        </td>
                    @else
                        <td>
                            no solutions yet
                        </td>
                    @endif
                @endforeach
            </tr>
        @endforeach
    </table>
@endsection