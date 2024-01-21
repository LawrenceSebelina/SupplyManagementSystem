const addUserAccForm = document.querySelector("#addUserAccForm");
const btnAddUserAcc = document.querySelector("#addUserAccForm #btnAddUserAcc");
const addUAAlertMsg = document.querySelector("#addUserAccForm #alertMessage");

addUserAccForm.onsubmit = (e)=> {
    e.preventDefault();
}

btnAddUserAcc.onclick = ()=> {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../includes/phpFunction/user-account-add.php", true);
    xhr.onload = ()=> {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "success") {
                    swal('Added Success!', 'New user account created!', 'success').then(function() {
                        window.location.href = window.location.href;
                    });
                } else {
                    addUAAlertMsg.style.display = "block";
                    addUAAlertMsg.textContent = data;
                }
            }
        }
    }
    let formData = new FormData(addUserAccForm);
    xhr.send(formData);
}
