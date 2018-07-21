@extends('layouts.layout_mark')

@section('sidebar')
    <table class="simple-little-table">
        <tr>
            <th>Users/Moduls</th>
            @foreach($group->tasklists()->get() as $module)
            <th>{{$module->name}}</th>
            @endforeach
        </tr>
        @foreach($group->users()->get() as $student)
        <tr>
            <td>{{$student->name}}</td>
        </tr>
        @endforeach
    </table>
@endsection