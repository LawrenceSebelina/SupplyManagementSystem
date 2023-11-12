const updatePOForm = document.querySelector("#updatePOForm");
const updatePOSubmitBtn = document.querySelector("#updatePOForm #btnUpdatePO");
const updatePOAlertMsg = document.querySelector("#updatePOForm #alertMessage");

updatePOForm.onsubmit = (e)=> {
    e.preventDefault();
}

updatePOSubmitBtn.onclick = ()=> {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../includes/phpFunction/purchase-order-edit.php", true);
    xhr.onload = ()=> {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "success") {
                    swal('Updated Success!', 'Purchase order updated!', 'success').then(function() {
                        window.location.href = window.location.href;
                    });
                } else {
                    updatePOAlertMsg.style.display = "block";
                    updatePOAlertMsg.textContent = data;
                }
            }
        }
    }
    let formData = new FormData(updatePOForm);
    xhr.send(formData);
}