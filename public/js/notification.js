var wrapper = document.getElementById('wrapper');

function getNotification() {
    $.ajax({
        url: 'ajax-notification',
        cache: false,
        type: 'GET',
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

setInterval(getNotification, 1000);
