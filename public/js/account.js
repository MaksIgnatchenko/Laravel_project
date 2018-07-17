var token = document.getElementsByName('_token')[0].value;
var changePasswordForm = document.getElementById('changePasswordForm');
var mailForm = document.getElementById('mailForm');
var newPass = document.getElementById("newPass");
var newPass2 = document.getElementById("newPass2");
var currentPass = document.getElementById("currentPass");
var passForm = document.getElementById('passForm');
var changePassButton = document.getElementById('changePassButton');
var mailFormButton = document.getElementById('mailFormButton');
var changeMailButton = document.getElementById('changeMailButton');
var newMail = document.getElementById('newMail');
var isWarning = false;
var isMailWarning = false;
changePasswordForm.Clicked = false;
mailFormButton.Clicked = false;
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
changeMailButton.addEventListener('click', changeMail);

mailFormButton.addEventListener('click', function() {
    if(this.Clicked == false) {
        mailForm.style.display = 'block';
        this.Clicked = true;
    } else {
        mailForm.style.display = 'none';
        this.Clicked = false;
    }
})

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

function changeMail() {
    if (validateEmail(newMail.value)) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': token
            },
            url: '/changeMail',
            cache: false,
            type: 'POST',
            data: {
                'newMail' : newMail.value,
            },
            success: function (data, textStatus, xhr) {
                newMail.value = "";
                console.log(data);
                mailWarnings('Your mail has been changed', 'ok');
            },
            error :function(err) {
                console.log(err);
                let message = "";
                for (var i in err.responseJSON.errors) {
                    message += err.responseJSON.errors[i] + "<br>";
                }
                mailWarnings(message);
            }
        })
        mailWarnings('your email has been changed', 'ok');
    } else {
        mailWarnings('incorrect mail format');
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

function mailWarnings(message, correct) {
    if (isMailWarning) {
        mailForm.removeChild(isMailWarning);
        isMailWarning = null;
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
        mailForm.appendChild(warning);
        isMailWarning = warning;
    }
}

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

