document.addEventListener("DOMContentLoaded", function () {
    let productForm = document.getElementById("productForm");
    let categoryForm = document.getElementById("category-form");

    if (productForm) {
        productForm.addEventListener("submit", validateProductForm);
    }

    if (categoryForm) {
        categoryForm.addEventListener("submit", validateCategoryForm);
    }

    loadCategories();
});


function validateProductForm(event) {
    event.preventDefault();
    let isValid = true;

    let productName = document.querySelector("input[name='product-name']");
    let price = document.querySelector("input[name='price']");
    let category = document.querySelector("select[name='category']");
    let image = document.querySelector("input[name='product-picture']");

    clearErrors();

    if (!productName.value.trim()) {
        showError(productName, "Product name is required.");
        isValid = false;
    } else if (!/^[a-zA-Z\s]+$/.test(productName.value.trim())) {
        showError(productName, "Product name can only contain letters.");
        isValid = false;
    }
    

    if (!price.value.trim() || parseFloat(price.value) <= 0) {
        showError(price, "Price must be a positive number.");
        isValid = false;
    }

    if (!category.value.trim()) {
        showError(category, "Please select a category.");
        isValid = false;
    } else if (!/^[A-Za-z\s]+$/.test(category.value.trim())) {
        showError(category, "Please enter a valid category name (letters only).");
        isValid = false;
    }
    
    if (!image.files.length) {
        showError(image, "Please upload a product image.");
        isValid = false;
    } else {
        let allowedExtensions = ["jpg", "jpeg", "png", "gif"];
        let fileExtension = image.files[0].name.split(".").pop().toLowerCase();
        if (!allowedExtensions.includes(fileExtension)) {
            showError(image, "Only JPG, JPEG, PNG, and GIF files are allowed.");
            isValid = false;
        }
    }

    if (isValid) {
        event.target.submit();
    }
}

function validateCategoryForm(event) {
    event.preventDefault();
    let isValid = true;
    
    let categoryName = document.getElementById("categoryName");
    clearErrors();

    if (!categoryName.value.trim()) {
        showError(categoryName, "Category name is required.");
        isValid = false;
    } 
    else if (!/^[a-zA-Z\s]+$/.test(categoryName.value.trim())) {
        showError(categoryName, "Category name can only contain letters.");
        isValid = false;
    }
    else {
        let categories = JSON.parse(localStorage.getItem("categories")) || [];
        if (categories.some(cat => cat.toLowerCase() === categoryName.value.trim().toLowerCase())) {
            showError(categoryName, "Category already exists.");
            isValid = false;
        }
    }

    if (isValid) {
        saveCategory(event);
    }
}



function showError(input, message) {
    let errorSpan = document.createElement("div");
    errorSpan.classList.add("error-message", "text-danger", "mt-1");
    errorSpan.textContent = message;

    let parentDiv = input.closest(".mb-3");
    if (parentDiv && !parentDiv.querySelector(".error-message")) {
        parentDiv.appendChild(errorSpan);
    }
}

function clearErrors() {
    document.querySelectorAll(".error-message").forEach(error => error.remove());
}

function saveCategory() {
    let categoryName = document.getElementById("categoryName").value.trim();
    if (!categoryName) return;

    let categories = JSON.parse(localStorage.getItem("categories")) || [];

    if (categories.some(cat => cat.toLowerCase() === categoryName.toLowerCase())) {
        showError(document.getElementById("categoryName"), "Category already exists!");
        return;
    }

    categories.push(categoryName);
    localStorage.setItem("categories", JSON.stringify(categories));

    window.location.href = "../views/admin/products/create.view.php";
    
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
