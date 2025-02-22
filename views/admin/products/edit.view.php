<?php
use Core\Database;
require_once BASE_PATH . '/core/database.php';

$db = new Database();

if (!isset($_GET['id'])) {
    echo "No product ID provided.";
    exit;
}


$product = $db->show($_GET['id'], 'Product');
if (!$product) {
    echo "<p class='text-danger'>Product not found.</p>";
    exit;
}


$errors = [];
$old_data = $product;
if (isset($_GET['errors'])) {
    $errors = json_decode(urldecode($_GET['errors']), true);
}
if (isset($_GET['old'])) {
    $old_data = json_decode(urldecode($_GET['old']), true);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Product</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../../styles/products.css">
</head>
<body>

  <div class="container">
    <h1 class="my-4">Edit Product</h1>
    <form action="/admin/products/update" method="POST" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= htmlspecialchars($product['id']) ?>">


    <div class="mb-3">
        <label class="form-label">Product Name</label>
        <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($old_data['name'] ?? $product['name']) ?>">
        <p class="text-danger"><?= htmlspecialchars($errors['name'] ?? '') ?></p>
      </div>


      <div class="mb-3">
        <label class="form-label">Price</label>
        <input type="number" step="0.01" name="price" class="form-control" value="<?= htmlspecialchars($old_data['price'] ?? $product['price']) ?>">
        <p class="text-danger"><?= htmlspecialchars($errors['price'] ?? '') ?></p>
      </div>


      <div class="mb-3">
        <label class="form-label">Quantity</label>
        <input type="number" name="quantity" class="form-control" value="<?= htmlspecialchars($old_data['quantity'] ?? $product['quantity']) ?>">
        <p class="text-danger"><?= htmlspecialchars($errors['quantity'] ?? '') ?></p>
      </div>


      <div class="mb-3">
  <label class="form-label">Product Image</label>
  <input type="file" name="product_image" class="form-control">
  <p class="text-danger"><?= htmlspecialchars($errors['product_image'] ?? '') ?></p>
</div>

      <button type="submit" class="btn btn-primary">Update</button>
      <a href="/admin/products" class="btn btn-secondary">Cancel</a>    </form>
  </div>
</body>
</html>