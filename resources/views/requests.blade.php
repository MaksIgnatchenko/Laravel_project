@extends('layouts.layout_request')
@if(isset($roleRequests))
@section('sidebar')
{{ csrf_field() }}
    <ul style="margin: 0 20px 20px 0;">
    	@if(isset($roleRequests))
    		@foreach($roleRequests as $roleRequest)
    		    <li id="request{{ $roleRequest->id }}">
                    <span style="color: white">{{ $roleRequest->sender->name }}</span>
                    <span style="color: white">Request for a teacher role</span>
                    <a id="apply{{ $roleRequest->id }}" href="#"
                        onclick="processRequest(this.id)">
                        <span class="apply" >&#10004; Apply</span>
                    </a>
                    <a id="decline{{ $roleRequest->id }}" href="#"
                        onclick="processRequest(this.id)">
                        <span class="decline">&#10008; Decline</span>
                    </a>
    		    </li>
    		@endforeach
		@endif
    </ul>
<script type="text/javascript">
    function processRequest(id) {
        var operationType = id.replace(/[0-9]/g, '');
        var requestId = id.replace(/[^0-9]/g, '');
        if (operationType == 'apply') {
            postAjax('/apply-request', requestId);
        } else {
            postAjax('/decline-request', requestId);
        }
    }

    function postAjax(requestUrl, requestId) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': token
            },
            url: requestUrl,
            cache: false,
            type: 'POST',
            data: {
                'requestId' : requestId,
                'userId' : userId
            },
            success: function (data, textStatus, xhr) {
                var requestLiName = 'request' + requestId;
                var requestLi = document.getElementById(requestLiName);
                requestLi.remove();

            },
            error :function(err) {
            }
        })
    }
</script>
@endsection
@endif

@if(count($teachers))
@section('sidebar1')
    <h3 style="color: #fff;">Teachers</h3>
    <nav class='animated bounceInDown nav'>
        @foreach($teachers as $teacher)
            <ul style="margin: 0 20px 20px 0;">
                <li>
                    <a href="">
                        {{ $teacher->name }}
                        <a style="all: unset" href="/change-role/{{ $teacher->id }}">
                            <i class="fa fa-ban delete" aria-hidden="true"></i>
                        </a>
                    </a>
                </li>
            </ul>
        @endforeach
    </nav>
@endsection
@endif

@if(isset($users))
@section('content1')
    <ul >
        <h3 style="color: #fff;">Users</h3>
        <nav class='animated bounceInDown nav'>
            @foreach($users as $user)
                <ul id="userList">
                    <li style="margin-bottom: 8px">
                        <a href="">
                            {{ $user->name }}
                            <a style="all: unset" href="/deleteUser/{{$user->id}}" class="userTrash">
                                <i class="fa fa-trash delete" aria-hidden="true"></i>
                            </a>
                        </a>
                    </li>
                </ul>
            @endforeach
        </nav>
    </ul>

    <script>

        $('a.userTrash').click(function(e) {
            if(!confirm('Are you sure? This delete user totally'))
            e.preventDefault();
        });

    </script>
@endsection
@endif
