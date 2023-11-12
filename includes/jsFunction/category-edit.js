const updateCatForm = document.querySelector("#updateCatForm");
const updateCatSubmitBtn = document.querySelector("#updateCatForm #btnUpdateCat");
const updateCatAlertMsg = document.querySelector("#updateCatForm #alertMessage");

updateCatForm.onsubmit = (e)=> {
    e.preventDefault();
}

updateCatSubmitBtn.onclick = ()=> {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../includes/phpFunction/category-edit.php", true);
    xhr.onload = ()=> {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "success") {
                    swal('Updated Success!', 'Category updated!', 'success').then(function() {
                        window.location.href = window.location.href;
                    });
                } else {
                    updateCatAlertMsg.style.display = "block";
                    updateCatAlertMsg.textContent = data;
                }
            }
        }
    }
    let formData = new FormData(updateCatForm);
    xhr.send(formData);
}
