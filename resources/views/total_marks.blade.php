@extends('layouts.layout_mark')

@section('sidebar')
    <table class="simple-little-table">
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
                <td>{{$rate}}</td>
                @endforeach
            </tr>
        @endforeach
    </table>
@endsection