const updateFPForm = document.querySelector("#updateFPForm");
const updateFPSubmitBtn = document.querySelector("#updateFPModal #btnUpdateFP");
const updateFPAlertMsg = document.querySelector("#updateFPModal #alertMessage");

updateFPModal.onsubmit = (e)=> {
    e.preventDefault();
}

updateFPSubmitBtn.onclick = ()=> {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../includes/phpFunction/finish-product-edit.php", true);
    xhr.onload = ()=> {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "success") {
                    swal('Updated Success!', 'Finish product updated!', 'success').then(function() {
                        window.location.href = window.location.href;
                    });
                } else {
                    updateFPAlertMsg.style.display = "block";
                    updateFPAlertMsg.textContent = data;
                }
            }
        }
    }
    let formData = new FormData(updateFPForm);
    xhr.send(formData);
}
