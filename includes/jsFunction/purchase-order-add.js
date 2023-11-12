const addPOForm = document.querySelector("#addPOForm");
const addPOSubmitBtn = document.querySelector("#addPOForm #btnAddPO");
const addPOAlertMsg = document.querySelector("#addPOForm #alertMessage");

addPOForm.onsubmit = (e)=> {
    e.preventDefault();
}

addPOSubmitBtn.onclick = ()=> {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../includes/phpFunction/purchase-order-add.php", true);
    xhr.onload = ()=> {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "success") {
                    swal('Added Success!', 'New purchase order added!', 'success').then(function() {
                        window.location.href = window.location.href;
                    });
                } else {
                    addPOAlertMsg.style.display = "block";
                    addPOAlertMsg.textContent = data;
                }
            }
        }
    }
    let formData = new FormData(addPOForm);
    xhr.send(formData);
}
