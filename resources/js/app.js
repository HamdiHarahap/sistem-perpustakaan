import "./bootstrap";

const selectYear = document.getElementById("year");
const currentYear = new Date().getFullYear();

for (let year = 2000; year <= currentYear; year++) {
    let option = document.createElement("option");
    option.value = year;
    option.textContent = year;
    selectYear.appendChild(option);
}
