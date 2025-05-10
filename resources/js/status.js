document.addEventListener("DOMContentLoaded", function () {
    document.addEventListener("click", function (event) {
        const button = event.target.closest(".btn-status");
        if (!button) return;

        if (button.textContent.trim() === "kembali") {
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
                    button.closest("form").submit();
                }
            });
        }
    });
});
