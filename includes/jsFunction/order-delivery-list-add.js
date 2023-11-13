const addODLForm = document.querySelector("#addODLForm");
const addODLSubmitBtn = document.querySelector("#addODLForm #btnaddODL");
const addODLAlertMsg = document.querySelector("#addODLForm #alertMessage");

addODLForm.onsubmit = (e)=> {
    e.preventDefault();
}

addODLSubmitBtn.onclick = ()=> {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../includes/phpFunction/order-delivery-list-add.php", true);
    xhr.onload = ()=> {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "success") {
                    swal('Added Success!', 'New order delivery added!', 'success').then(function() {
                        window.location.href = window.location.href;
                    });
                } else {
                    addODAlertMsg.style.display = "block";
                    addODAlertMsg.textContent = data;
                }
            }
        }
    }
    let formData = new FormData(addODLForm);
    xhr.send(formData);
}
