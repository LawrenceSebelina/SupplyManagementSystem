// TODO: Loading State JS

const preloader = document.querySelector(".preloader");

window.addEventListener("load", function() {
    preloader.classList.add("loaded");
    document.body.classList.add("loaded");
});

// TODO: End of Loading State JS

// TODO: Select Option Arrow Icon on the right

document.addEventListener('DOMContentLoaded', function () {
    var select = document.querySelector('.select-option-field');
    var arrowIcon = document.querySelector('.select-option-icon');

    select.addEventListener('click', function () {
        arrowIcon.classList.toggle('rotate-up');
    });
});

// TODO: End of Select Option Arrow Icon on the right

// TODO: Show Hide Password

function setupPasswordToggle(inputField, icon) {
    const passwordInput = document.querySelector(`.${inputField} [type="password"]`);
    const showHidePassIcon = document.querySelector(`.${inputField} .${icon}`);

    showHidePassIcon.onclick = () => {
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            showHidePassIcon.classList.add("active");
        } else {
            passwordInput.type = "password";
            showHidePassIcon.classList.remove("active");
        }
    };
}

setupPasswordToggle('password-input-field', 'show-hide-password-icon');
setupPasswordToggle('password-c-input-field', 'show-hide-password-icon');

// TODO: End of Show Hide Password