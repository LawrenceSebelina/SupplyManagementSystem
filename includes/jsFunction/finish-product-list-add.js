const addFPLForm = document.querySelector("#addFPLForm");
const addFPLSubmitBtn = document.querySelector("#addFPLForm #btnaddFPL");
const addFPLAlertMsg = document.querySelector("#addFPLForm #alertMessage");

addFPLForm.onsubmit = (e)=> {
    e.preventDefault();
}

addFPLSubmitBtn.onclick = ()=> {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../includes/phpFunction/finish-product-list-add.php", true);
    xhr.onload = ()=> {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "success") {
                    swal('Added Success!', 'New order delivery added!', 'success').then(function() {
                        window.location.href = window.location.href;
                    });
                } else {
                    addFPLAlertMsg.style.display = "block";
                    addFPLAlertMsg.textContent = data;
                }
            }
        }
    }
    let formData = new FormData(addFPLForm);
    xhr.send(formData);
}
