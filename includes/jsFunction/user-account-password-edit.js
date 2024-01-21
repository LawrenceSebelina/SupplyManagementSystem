const updateUserPassForm = document.querySelector("#updateUserPassForm");
const btnUpdateUserPass = document.querySelector("#updateUserPassForm #btnUpdateUserPass");
const updateUPAlertMsg = document.querySelector("#updateUserPassForm #alertMessage");

updateUserPassForm.onsubmit = (e)=> {
    e.preventDefault();
}

btnUpdateUserPass.onclick = ()=> {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../includes/phpFunction/user-account-password-edit.php", true);
    xhr.onload = ()=> {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "success") {
                    swal('Added Success!', 'Password updated!', 'success').then(function() {
                        window.location.href = window.location.href;
                    });
                } else {
                    updateUPAlertMsg.style.display = "block";
                    updateUPAlertMsg.textContent = data;
                }
            }
        }
    }
    let formData = new FormData(updateUserPassForm);
    xhr.send(formData);
}
