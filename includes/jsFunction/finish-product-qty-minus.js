const minusFPQtyForm = document.querySelector("#minusFPQtyForm");
const minusFPQtySubmitBtn = document.querySelector("#minusFPQtyForm #btnMinusFPQty");
const minusFPQtyAlertMsg = document.querySelector("#minusFPQtyForm #alertMessage");

minusFPQtyForm.onsubmit = (e)=> {
    e.preventDefault();
}

minusFPQtySubmitBtn.onclick = ()=> {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../includes/phpFunction/finish-product-qty-minus.php", true);
    xhr.onload = ()=> {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "success") {
                    swal('Added Success!', 'New order delivery added!', 'success').then(function() {
                        window.location.href = window.location.href;
                    });
                } else {
                    minusFPQtyAlertMsg.style.display = "block";
                    minusFPQtyAlertMsg.textContent = data;
                }
            }
        }
    }
    let formData = new FormData(minusFPQtyForm);
    xhr.send(formData);
}
