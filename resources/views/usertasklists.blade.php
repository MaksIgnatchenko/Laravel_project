@extends('layouts.layout_admin')
@section('sidebar')
    <nav class='animated bounceInDown nav'>
        @forelse($tasklists as $key => $value)
            <ul>
                <li class="sub-menu">
                    <a>{{$key}}</a>
                    @foreach($value as $tasklist)
                        <ul>
                            <li><a href="/module-train/{{ $tasklist->id }}">{{$tasklist->name}}</a></li>
                        </ul>
                    @endforeach
                </li>
            </ul>
            @empty
                <h2 style="color: #fff;">You are not yet registered with the group</h2>
    @endforelse
    </nav>
    @endsection