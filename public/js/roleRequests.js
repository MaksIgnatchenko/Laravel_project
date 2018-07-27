var roleRequests = document.getElementById('roleRequests');
var backGroundColor = window.getComputedStyle(roleRequests, null).getPropertyValue("background-color");

function checkRequests() {
	$.ajax({
            url: 'change-role-request',
            cache: false,
            type: 'GET',            
            success: function (data, textStatus, xhr) {
            	if(data == true) {
            		roleRequests.style.backgroundColor = 'red';	
            	} else {
            		roleRequests.style.backgroundColor = backGroundColor;		
            	}                
            },
            error :function(err) {
            	console.log(err);
            }
        })
}

setInterval(checkRequests, 1000);