const addCatForm = document.querySelector("#addCatForm");
const addCatSubmitBtn = document.querySelector("#addCatForm #btnAddCat");
const addCatAlertMsg = document.querySelector("#addCatForm #alertMessage");

addCatForm.onsubmit = (e)=> {
    e.preventDefault();
}

addCatSubmitBtn.onclick = ()=> {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../includes/phpFunction/category-add.php", true);
    xhr.onload = ()=> {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "success") {
                    swal('Added Success!', 'New category added!', 'success').then(function() {
                        window.location.href = window.location.href;
                    });
                } else {
                    addCatAlertMsg.style.display = "block";
                    addCatAlertMsg.textContent = data;
                }
            }
        }
    }
    let formData = new FormData(addCatForm);
    xhr.send(formData);
}
