<!--Sub Screen 8-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <link href="/styles/categorystyle.css" rel="stylesheet">

   
</head>
<body>

<div class="category-form">
    <form id="category-form">
        <i class="bi bi-folder-fill text-primary" style="font-size: 3rem; margin-bottom: 10px;"></i> 
        <h3 class="mb-4">Add New Category</h3>
        <div class="mb-3" style="padding-bottom: 10px;">
            <input type="text" id="categoryName" name="category_name" class="form-control" placeholder="Enter category name">
            <span class="error-message text-danger"></span>

        </div>
        <button type="submit" class="btn btn-primary w-100">Save Category</button>
    </form>
    
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="/scripts/category.js"></script>
<script src="/scripts/validation.js"></script>



</body>
</html>