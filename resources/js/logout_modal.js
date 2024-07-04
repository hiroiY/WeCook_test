// The js script for logout modal
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
