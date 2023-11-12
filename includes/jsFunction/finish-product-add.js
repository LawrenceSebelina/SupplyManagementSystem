const addFPForm = document.querySelector("#addFPForm");
const addFPSubmitBtn = document.querySelector("#addFPForm #btnAddFP");
const addFPAlertMsg = document.querySelector("#addFPForm #alertMessage");

addFPForm.onsubmit = (e)=> {
    e.preventDefault();
}

addFPSubmitBtn.onclick = ()=> {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../includes/phpFunction/finish-product-add.php", true);
    xhr.onload = ()=> {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "success") {
                    swal('Added Success!', 'New finished product added!', 'success').then(function() {
                        window.location.href = window.location.href;
                    });
                } else {
                    addFPAlertMsg.style.display = "block";
                    addFPAlertMsg.textContent = data;
                }
            }
        }
    }
    let formData = new FormData(addFPForm);
    xhr.send(formData);
}
