var token = document.getElementsByName('_token')[0].value;
var changePasswordForm = document.getElementById('changePasswordForm');
var newPass = document.getElementById("newPass");
var newPass2 = document.getElementById("newPass2");
var currentPass = document.getElementById("currentPass");
var passForm = document.getElementById('passForm');
var changePassButton = document.getElementById('changePassButton');
var isWarning = false;
changePasswordForm.Clicked = false;
changePasswordForm.addEventListener('click', function() {

    if(this.Clicked == false) {
        passForm.style.display = 'block';
        this.Clicked = true;
    } else {
        passForm.style.display = 'none';
        this.Clicked = false;
    }
});
newPass.addEventListener('input', checkNewPass);
newPass2.addEventListener('input', checkNewPass);
changePassButton.addEventListener('click', changePassword);

function checkNewPass() {
    warnings();
    if (newPass == "") {
        warnings('Enter new password');
    }
    if (newPass2 == "") {
        warnings('Repeat the new password');
    }
    if (newPass2.value != newPass.value) {
        warnings('Repeat the new password correctly');
    }
    if (currentPass.value == "") {
        warnings('Enter current password');
    }
}
function changePassword() {
    if ((currentPass.value != "") && (newPass2.value == newPass.value) && (newPass2.value != "")) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': token
            },
            url: '/changePassword',
            cache: false,
            type: 'POST',
            data: {
                'newPass' : newPass2.value,
                'currentPass' : currentPass.value
            },
            success: function (data, textStatus, xhr) {
                currentPass.value = "";
                newPass.value = "";
                newPass2.value = "";
                    warnings('Your password has been changed', 'ok');
            },
            error :function(err) {
                let message = "";
                for (var i in err.responseJSON.errors) {
                    message += err.responseJSON.errors[i] + "<br>";
                }
                warnings(message);
            }
        })
    }
}

function warnings(message, correct) {
    if (isWarning) {
        passForm.removeChild(isWarning);
        isWarning = null;
    }
    if (message) {
        var warning = document.createElement('div');
        warning.className =('t2');
        warning.innerHTML = message;
        if (correct) {
            warning.style.color = "Green";
        } else {
            warning.style.color = "Red";
        }
        passForm.appendChild(warning);
        isWarning = warning;

    }
}

