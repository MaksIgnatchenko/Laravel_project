var token = document.getElementsByName('_token')[0].value;
var changePasswordForm = document.getElementById('changePasswordForm');
var mailForm = document.getElementById('mailForm');
var nameForm = document.getElementById('nameForm');
var newPass = document.getElementById("newPass");
var newPass2 = document.getElementById("newPass2");
var newName = document.getElementById("newName");
var currentPass = document.getElementById("currentPass");
var passForm = document.getElementById('passForm');
var nameForm = document.getElementById('nameForm');
var changePassButton = document.getElementById('changePassButton');
var mailFormButton = document.getElementById('mailFormButton');
var nameFormButton = document.getElementById('nameFormButton');
var changeMailButton = document.getElementById('changeMailButton');
var changeNameButton = document.getElementById('changeNameButton');
var newMail = document.getElementById('newMail');
var viewMail = document.getElementById('viewMail');
var viewName = document.getElementById('viewName');
var setPhoto = document.getElementById('setPhoto');
var avatarForm = document.getElementById('avatarForm');
var changeRoleRequest = document.getElementById('changeRoleRequest');
var userId = document.getElementById('userId').value;
var isWarning = false;
var isMailWarning = false;
var isNameWarning = false;
changePasswordForm.Clicked = false;
mailFormButton.Clicked = false;
nameFormButton.Clicked = false;
setPhoto.Clicked = false;
changePasswordForm.addEventListener('click', function() {

    if(this.Clicked == false) {
        passForm.style.display = 'block';
        this.Clicked = true;
    } else {
        passForm.style.display = 'none';
        this.Clicked = false;
    }
});

setPhoto.addEventListener('click', function() {

    if(this.Clicked == false) {
        avatarForm.style.display = 'block';
        this.Clicked = true;
    } else {
        avatarForm.style.display = 'none';
        this.Clicked = false;
    }
});

newPass.addEventListener('input', checkNewPass);
newPass2.addEventListener('input', checkNewPass);
changePassButton.addEventListener('click', changePassword);
changeMailButton.addEventListener('click', changeMail);
changeNameButton.addEventListener('click', changeName);
changeRoleRequest.addEventListener('click', changeRole);

mailFormButton.addEventListener('click', function() {
    if(this.Clicked == false) {
        mailForm.style.display = 'block';
        this.Clicked = true;
    } else {
        mailForm.style.display = 'none';
        this.Clicked = false;
    }
})

nameFormButton.addEventListener('click', function() {
    if(this.Clicked == false) {
        nameForm.style.display = 'block';
        this.Clicked = true;
    } else {
        nameForm.style.display = 'none';
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

function checkName() {
    nameWarnings();
    if (newName.value.length < 2) {
        return false;
    } else {
        return true;
    }
}

function changeRole() {
    $.ajax({
            headers: {
                'X-CSRF-TOKEN': token
            },
            url: '/change-role',
            cache: false,
            type: 'POST',
            data: {
                'userId' : userId
            },
            success: function (data, textStatus, xhr) {
                nameWarnings('Your request on teacher role has been sent', 'ok');
            },
            error :function(err) {
                let message = "";
                for (var i in err.responseJSON.errors) {
                    message += err.responseJSON.errors[i] + "<br>";
                }
                nameWarnings(message);
            }
        })
}

function changeName() {
    if (checkName()) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': token
            },
            url: '/changeName',
            cache: false,
            type: 'POST',
            data: {
                'newName' : newName.value,
            },
            success: function (data, textStatus, xhr) {
                nameWarnings('Your name has been changed', 'ok');
                viewName.innerText = newName.value;
                newName.value = "";
            },
            error :function(err) {
                let message = "";
                for (var i in err.responseJSON.errors) {
                    message += err.responseJSON.errors[i] + "<br>";
                }
                nameWarnings(message);
            }
        })
        nameWarnings('your name has been changed', 'ok');
    } else {
        nameWarnings('Name must contain at least 4 characters');
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
                mailWarnings('Your mail has been changed', 'ok');
                viewMail.innerText = newMail.value;
                newMail.value = "";
            },
            error :function(err) {
                let message = "";
                for (var i in err.responseJSON.errors) {
                    message += err.responseJSON.errors[i] + "<br>";
                }
                viewMail.innerText = newMail.value;
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

function nameWarnings(message, correct) {
    if (isNameWarning) {
        nameForm.removeChild(isNameWarning);
        isNameWarning = null;
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
        nameForm.appendChild(warning);
        isNameWarning = warning;
    }
}

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

