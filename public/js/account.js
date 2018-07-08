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
    if (isWarning) {
        passForm.removeChild(isWarning);
        isWarning = null;
    }
    if((newPass2.value != newPass.value) && (newPass.value != "") && (newPass2.value != "")) {
        warning = document.createElement('div');
        warning.innerHTML = 'Passwords do no match';
        warning.class = 'warning';
        passForm.appendChild(warning);
        isWarning = warning;
    }
}
function changePassword() {
    if ((currentPass.value != "") && (newPass2.value == newPass.value) && (newPass2.value != "")) {
        console.log(newPass2.value);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': token
            },
            url: '/changePassword',
            cache: false,
            type: 'POST',
            data: {
                'newPass': newPass2.value
            },
            success: function () {
                alert('Password has been changed');
            }
        })
    }
}
