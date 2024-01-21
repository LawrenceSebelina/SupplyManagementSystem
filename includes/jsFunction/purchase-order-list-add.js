const addPOLForm = document.querySelector("#addPOLForm");
const addPOLSubmitBtn = document.querySelector("#addPOLForm #btnAddPOL");
const addPOLAlertMsg = document.querySelector("#addPOLForm #alertMessage");

addPOLForm.onsubmit = (e)=> {
    e.preventDefault();
}

addPOLSubmitBtn.onclick = ()=> {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../includes/phpFunction/purchase-order-list-add.php", true);
    xhr.onload = ()=> {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "success") {
                    swal('Added Success!', 'New order delivery added!', 'success').then(function() {
                        window.location.href = window.location.href;
                    });
                } else {
                    addPOLAlertMsg.style.display = "block";
                    addPOLAlertMsg.textContent = data;
                }
            }
        }
    }
    let formData = new FormData(addPOLForm);
    xhr.send(formData);
}
