const updateUserAccForm = document.querySelector("#updateUserAccForm");
const btnUpdateUserAcc = document.querySelector("#updateUserAccForm #btnUpdateUserAcc");
const updateUAAlertMsg = document.querySelector("#updateUserAccForm #alertMessage");

updateUserAccForm.onsubmit = (e)=> {
    e.preventDefault();
}

btnUpdateUserAcc.onclick = ()=> {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../includes/phpFunction/user-account-edit.php", true);
    xhr.onload = ()=> {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "success") {
                    swal('Added Success!', 'Profile updated!', 'success').then(function() {
                        window.location.href = window.location.href;
                    });
                } else {
                    updateUAAlertMsg.style.display = "block";
                    updateUAAlertMsg.textContent = data;
                }
            }
        }
    }
    let formData = new FormData(updateUserAccForm);
    xhr.send(formData);
}
