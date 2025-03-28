document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".delete-btn").forEach((button) => {
        button.addEventListener("click", function (event) {
            event.preventDefault();

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    this.closest("form").submit();
                }
            });
        });
    });
});
