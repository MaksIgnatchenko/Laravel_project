var wrapper = document.getElementById('wrapper');

var user_id = $("#user_id").val();

function getNotification() {
    $.ajax({
        url: 'ajax-notification',
        cache: false,
        type: 'GET',
        data: {
            user_id : user_id
        },
        success: function (data, textStatus, xhr) {
            if(data == true) {
                wrapper.style.display = 'block';
            } else {
                wrapper.style.display = 'none';
            }
        },
        error :function(err) {
        }
    })
}

setInterval(getNotification, 3000);

$('#wrapper').click(function() {
    $.get('/ajax-stopProcessed', {user_id: user_id},
        function() {
            window.location.reload();
        }
    )
});
