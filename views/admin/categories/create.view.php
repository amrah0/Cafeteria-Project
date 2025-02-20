<!--Sub Screen 8-->
<?php
if (isset($_GET['error'])){
    $errors = json_decode($_GET['error'], true);
    extract($errors);  # variable with values --> based on errors
//    var_dump($errors);
}
if(isset($_GET['old'])) {
    $old_data = json_decode($_GET['old'], true);
    if(isset($old['category_name'])){
        extract($old_data['category_name']);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />
    <script
    src="https://kit.fontawesome.com/ff0d0c2aec.js"
    crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <link href="/styles/categorystyle.css" rel="stylesheet">
    

   
</head>
<body>
<?php if (isset($_GET['success'])): ?>
    <div class="alert alert-success" role="alert">
        Category inserted successfully
    </div>

<?php endif; ?>
<div class="category-form">
    <form id="category-form" method="post" action="/controllers/admin/category/create.php">
        <i class="bi bi-folder-fill text-primary" style="font-size: 3rem; margin-bottom: 10px;"></i> 
        <h3 class="mb-4">Add New Category</h3>
        <div class="mb-3" style="padding-bottom: 10px;">
            <input type="text" id="categoryName" name="category_name" class="form-control" placeholder="Enter category name" value="<?php echo $old_data['category_name'] ?? ''; ?>">
            <span class="error-message text-danger"> <?php echo $errors['category_name'] ?? ''; ?></span>

        </div>
        <button type="submit" class="btn btn-primary w-100">Save Category</button>
        <!-- <a href="views/admin/products/create.view.php" class="btn btn-secondary m-2">Cancel</a>  -->
        
    </form>
    
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!--<script src="/scripts/category.js"></script>-->
<!--<script src="/scripts/validation.js"></script>-->



</body>
</html>