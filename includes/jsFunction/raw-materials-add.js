const addRMForm = document.querySelector("#addRMForm");
const addRMSubmitBtn = document.querySelector("#addRMForm #btnAddRM");
const addRMAlertMsg = document.querySelector("#addRMForm #alertMessage");

addRMForm.onsubmit = (e)=> {
    e.preventDefault();
}

addRMSubmitBtn.onclick = ()=> {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../includes/phpFunction/raw-materials-add.php", true);
    xhr.onload = ()=> {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "success") {
                    swal('Added Success!', 'New raw material added!', 'success').then(function() {
                        window.location.href = window.location.href;
                    });
                } else {
                    addRMAlertMsg.style.display = "block";
                    addRMAlertMsg.textContent = data;
                }
            }
        }
    }
    let formData = new FormData(addRMForm);
    xhr.send(formData);
}
