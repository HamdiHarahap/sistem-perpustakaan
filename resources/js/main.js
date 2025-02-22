const btnRules = document.querySelector(".rules-btn");
const listRules = document.querySelector(".rules-list");

btnRules.addEventListener("click", function (event) {
    event.stopPropagation();
    listRules.classList.toggle("hidden");
});

document.addEventListener("click", function (event) {
    if (
        !listRules.classList.contains("hidden") &&
        !listRules.contains(event.target)
    ) {
        listRules.classList.add("hidden");
    }
});
