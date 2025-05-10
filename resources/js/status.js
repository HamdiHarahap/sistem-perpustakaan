document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll(".btn-status");
    buttons.forEach((button) => {
        button.addEventListener("click", function (event) {
            /* if (button.textContent.trim() === "kembali") {
                Swal.fire({
                    title: "Update Status",
                    text: "Tidak dapat mengubah status",
                    icon: "info",
                });
            } else {
                event.preventDefault();
                Swal.fire({
                    title: "Kamu yakin ingin mengubah status?",
                    text: "Status akan di ubah ke kembali",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, ubah status",
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.closest("form").submit();
                    }
                });
            } */
            alert("sds");
        });
    });
});
