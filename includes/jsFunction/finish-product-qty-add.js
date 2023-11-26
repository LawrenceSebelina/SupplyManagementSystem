const addFPQtyForm = document.querySelector("#addFPQtyForm");
const addFPQtySubmitBtn = document.querySelector("#addFPQtyForm #btnAddFPQty");
const addFPQtyAlertMsg = document.querySelector("#addFPQtyForm #alertMessage");

addFPQtyForm.onsubmit = (e)=> {
    e.preventDefault();
}

addFPQtySubmitBtn.onclick = ()=> {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../includes/phpFunction/finish-product-qty-add.php", true);
    xhr.onload = ()=> {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "success") {
                    swal('Added Success!', 'New order delivery added!', 'success').then(function() {
                        window.location.href = window.location.href;
                    });
                } else {
                    addFPQtyAlertMsg.style.display = "block";
                    addFPQtyAlertMsg.textContent = data;
                }
            }
        }
    }
    let formData = new FormData(addFPQtyForm);
    xhr.send(formData);
}
