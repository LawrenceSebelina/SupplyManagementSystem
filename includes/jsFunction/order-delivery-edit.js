const updateODForm = document.querySelector("#updateODForm");
const updateODSubmitBtn = document.querySelector("#updateODForm #btnUpdateOD");
const updateODAlertMsg = document.querySelector("#updateODForm #alertMessage");

updateODForm.onsubmit = (e)=> {
    e.preventDefault();
}

updateODSubmitBtn.onclick = ()=> {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../includes/phpFunction/order-delivery-edit.php", true);
    xhr.onload = ()=> {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "success") {
                    swal('Updated Success!', 'Order delivery updated!', 'success').then(function() {
                        window.location.href = window.location.href;
                    });
                } else {
                    updateODAlertMsg.style.display = "block";
                    updateODAlertMsg.textContent = data;
                }
            }
        }
    }
    let formData = new FormData(updateODForm);
    xhr.send(formData);
}