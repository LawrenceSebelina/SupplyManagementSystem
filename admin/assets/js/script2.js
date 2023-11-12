// TODO: Loading State JS

const preloader = document.querySelector(".preloader");

window.addEventListener("load", function() {
    preloader.classList.add("loaded");
    document.body.classList.add("loaded");
});

// TODO: End of Loading State JS

// TODO: asdadadas

document.addEventListener('DOMContentLoaded', function () {
    var select = document.querySelector('.select-option-field');
    var arrowIcon = document.querySelector('.select-option-icon');

    select.addEventListener('click', function () {
        console.log("Test");
        arrowIcon.classList.toggle('rotate-up');
    });
});
