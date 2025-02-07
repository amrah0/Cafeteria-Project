function saveCategory(event) {
    event.preventDefault();

    let categoryName = document.getElementById("categoryName").value.trim();
    if (!categoryName) return;

    let categories = JSON.parse(localStorage.getItem("categories")) || [];



    categories.push(categoryName);
    localStorage.setItem("categories", JSON.stringify(categories));

    window.location.href = "../html/addproduct.html"; 
}


function loadCategories() {
    let categories = JSON.parse(localStorage.getItem("categories")) || [];
    let select = document.getElementById("categorySelect");

    if (select) {
        while (select.options.length > 1) {
            select.remove(1);
        }

        let uniqueCategories = [...new Set(categories.map(cat => cat.toLowerCase()))]; 

        uniqueCategories.forEach(category => {
            let option = document.createElement("option");
            option.value = category;
            option.textContent = category.charAt(0).toUpperCase() + category.slice(1); 
            select.appendChild(option);
        });
    }
}

document.addEventListener("DOMContentLoaded", function () {
    let form = document.getElementById("category-form");
    if (form) {
        form.addEventListener("submit", validateCategoryForm); 
    }
    loadCategories();
});





