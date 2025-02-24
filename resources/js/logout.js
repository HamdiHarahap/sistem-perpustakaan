document.querySelectorAll(".btn-logout").forEach((button) => {
    button.addEventListener("click", function () {
        Swal.fire({
            title: "Logout",
            text: "Kamu yakin ingin logout?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, logout",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "/logout";
            }
        });
    });
});
