const updateSuppyForm = document.querySelector("#updateSuppyForm");
const updateSupplySubmitBtn = document.querySelector("#updateSuppyForm #btnUpdateSupply");
const updateSupplyAlertMsg = document.querySelector("#updateSuppyForm #alertMessage");

updateSuppyForm.onsubmit = (e)=> {
    e.preventDefault();
}

updateSupplySubmitBtn.onclick = ()=> {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../includes/phpFunction/supply-edit.php", true);
    xhr.onload = ()=> {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "success") {
                    swal('Updated Success!', 'Supply updated!', 'success').then(function() {
                        window.location.href = window.location.href;
                    });
                } else {
                    updateSupplyAlertMsg.style.display = "block";
                    updateSupplyAlertMsg.textContent = data;
                }
            }
        }
    }
    let formData = new FormData(updateSuppyForm);
    xhr.send(formData);
}
