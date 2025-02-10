<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <link rel="stylesheet" href="/styles/add_product.css">
</head>
<body>

    <div class="container mt-5">
       
        <div style="text-align: center;">
            <i class="bi bi-cup-hot-fill display-1 text-primary me-3" id="cup"></i>
            <h2 class="mb-3" style="text-align: center;">Add New Product</h2>
        </div>


        <form class=" p-4 shadow rounded" id="productForm">

            <div class="mb-3">
                <label class="form-label fw-bold">Product Name</label>
                <input type="text" class="form-control" name="product-name" placeholder="Enter product name"style="color: #000;">
                <span class="error-message text-danger"></span>

            </div>


            <div class="mb-3">
                <label class="form-label fw-bold">Price</label>
                <input type="number" class="form-control" name="price" placeholder="Enter price" >
                <span class="error-message text-danger"></span>

            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Category</label>
                <div class="d-flex">
                        <select class="form-select me-2" id="categorySelect" name="category">
                        
                            
                            <option value="">Select Category</option>                        
                        <option value="hot-drinks">Hot Drinks</option>
                        <option value="cold-drinks">Cold Drinks</option>
                        <option value="snacks">Snacks</option>
                    </select>
                    <a href="/views/categories/create.view.php" class="btn btn-outline-primary">+ Add Category</a>
                    <span class="error-message text-danger"></span>

                </div>
            </div>


            <div class="mb-3">
                <label class="form-label fw-bold">Product Picture</label>
                <input type="file" class="form-control" name="product-picture">
                <span class="error-message text-danger"></span>

            </div>


            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-success px-4"><i class="bi bi-check-circle"></i> Save</button>
                <button type="reset" class="btn btn-danger px-4"><i class="bi bi-x-circle"></i> Reset</button>
            </div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/scripts/category.js"></script> 
    <script src="/scripts/validation.js"></script>



</body>
</html>