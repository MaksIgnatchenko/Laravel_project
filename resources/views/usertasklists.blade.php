@extends('layouts.layout_admin')
@section('sidebar')

    <nav class='animated bounceInDown nav'>
        @foreach($tasklists as $key => $value)
            <ul>
                <li class="sub-menu">
                    <a>{{$key}}</a>
                    @foreach($value as $tasklist)
                    <ul>
                        <li><a>{{$tasklist->name}}</a></li>
                    </ul>
                        @endforeach
                </li>
            </ul>
    @endforeach
    </nav>
    @endsection