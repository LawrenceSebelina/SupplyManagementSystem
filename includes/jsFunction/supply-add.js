const addSupplyForm = document.querySelector("#addSupplyForm");
const addSupplySubmitBtn = document.querySelector("#addSupplyForm #btnAddSupply");
const addSupplyAlertMsg = document.querySelector("#addSupplyForm #alertMessage");

addSupplyForm.onsubmit = (e)=> {
    e.preventDefault();
}

addSupplySubmitBtn.onclick = ()=> {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../includes/phpFunction/supply-add.php", true);
    xhr.onload = ()=> {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "success") {
                    swal('Added Success!', 'New supply added!', 'success').then(function() {
                        window.location.href = window.location.href;
                    });
                } else {
                    addSupplyAlertMsg.style.display = "block";
                    addSupplyAlertMsg.textContent = data;
                }
            }
        }
    }
    let formData = new FormData(addSupplyForm);
    xhr.send(formData);
}
