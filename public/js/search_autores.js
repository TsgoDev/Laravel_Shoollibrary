// Input de pesquisar produto página index
document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("searchInput");
    const tableRows = document.querySelectorAll("tbody tr");

    searchInput.addEventListener("keyup", function () {
        const searchTerm = searchInput.value.toLowerCase().trim();

        tableRows.forEach(row => {
            const productName = row.querySelector("td:nth-child(2)").textContent.toLowerCase();
            
            if (productName.includes(searchTerm)) {
                row.style.display = "table-row";
            } else {
                row.style.display = "none";
            }
        });
    });
});