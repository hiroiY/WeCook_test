// The js script for logout modal
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

document.addEventListener("DOMContentLoaded", function () {
    const logoutModal = new bootstrap.Modal(
        document.getElementById("logoutModal")
    );
    document
        .querySelector('.nav-link[data-bs-target="#logoutModal"]')
        .addEventListener("click", function () {
            logoutModal.show();
        });
    document.querySelector(".btn-close").addEventListener("click", function () {
        logoutModal.hide();
    });
});
