document.addEventListener("DOMContentLoaded", function () {
    fetch("/admin/check-late-returns")
        .then((response) => response.json())
        .then((data) => {
            console.log("Late returns checked:", data);
        })
        .catch((error) => console.error("Error checking late returns:", error));
});

document.querySelectorAll(".status-toggle").forEach((button) => {
    button.addEventListener("click", function () {
        const transactionId = this.dataset.id;

        fetch(`/admin/update-status/${transactionId}`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]'
                ).content,
            },
            body: JSON.stringify({}),
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    this.textContent = data.newStatus;
                    this.classList.toggle(
                        "bg-orange-500",
                        data.newStatus === "meminjam"
                    );
                    this.classList.toggle(
                        "bg-green-500",
                        data.newStatus === "kembali"
                    );
                    this.classList.toggle(
                        "bg-red-500",
                        data.newStatus === "denda"
                    );
                }
            })
            .catch((error) => console.error("Error:", error));
    });
});
