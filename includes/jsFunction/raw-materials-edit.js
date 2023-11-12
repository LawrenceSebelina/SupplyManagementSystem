const updateRMForm = document.querySelector("#updateRMForm");
const updateRMSubmitBtn = document.querySelector("#updateRMForm #btnUpdateRM");
const updateRMAlertMsg = document.querySelector("#updateRMForm #alertMessage");

updateRMForm.onsubmit = (e)=> {
    e.preventDefault();
}

updateRMSubmitBtn.onclick = ()=> {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../includes/phpFunction/raw-materials-edit.php", true);
    xhr.onload = ()=> {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "success") {
                    swal('Updated Success!', 'Raw material updated!', 'success').then(function() {
                        window.location.href = window.location.href;
                    });
                } else {
                    updateRMAlertMsg.style.display = "block";
                    updateRMAlertMsg.textContent = data;
                }
            }
        }
    }
    let formData = new FormData(updateRMForm);
    xhr.send(formData);
}
