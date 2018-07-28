@extends('layouts.layout_main')
@section('sidebar')
{{ csrf_field() }}
    <ul>
    	@if(isset($roleRequests))
    		@foreach($roleRequests as $roleRequest)
    		<li id="request{{ $roleRequest->id }}">
    			<span>{{ $roleRequest->sender->name }}</span>
				<span>Request for a teacher role</span>				
				<a id="apply{{ $roleRequest->id }}" href="#"
				 	onclick="processRequest(this.id)">
					<span class="apply" >&#10004; Apply</span>
				</a>
				<a class="decline" id="decline{{ $roleRequest->id }}" href="#"
				 	onclick="processRequest(this.id)">
					<span class="decline">&#10008; Decline</span>
			</a>			
    		</li>
    		@endforeach
			@else
			<span>There are no unprocessed requests</span>
    	@endif   	
    </ul>
@endsection

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