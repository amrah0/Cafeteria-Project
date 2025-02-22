<!--Screen 5-->
<?php

//use core\Database;
//
//if (!defined('BASE_PATH')) {
//  define('BASE_PATH', dirname(dirname(dirname(__DIR__))));
//}
//
//require_once BASE_PATH . '/core/Database.php';
//
//
//$db = new Database();
//$products = $db->select('Product');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>products</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="../../styles/products.css" />
  <script
    src="https://kit.fontawesome.com/ff0d0c2aec.js"
    crossorigin="anonymous"></script>
</head>

<body>
  <div class="container">

      <?php require base_path('/views/partials/nav.php')?>

      <div class="row m-2">
      <div class="col">
        <h1 class="">All Product</h1>

      </div>
      <div class="col text-end">
        <a href="/admin/products/create">Add Product</a>
      </div>
    </div>




    <div class="row m-2">
      <div class="col-12 table-responsive">
        <table class="table table-striped table-hover table-bordered text-center">
          <thead>
            <tr class="table-dark">
              <th>Product</th>
              <th>Price</th>
              <th>Image</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($products)): ?>
              <tr>
                <td colspan="4" class="text-danger">No products available.</td>
              </tr>
            <?php else: ?>
              <?php foreach ($products as $product): ?>
                <tr>
                  <td><?= htmlspecialchars($product['name']) ?></td>
                  <td><?= htmlspecialchars($product['price']) ?> EGP</td>
                  <td>
                    <img src="/Images/<?= htmlspecialchars($product['image_url']) ?>" alt="Product Image" style="width: 80px; height: 80px;">
                  </td>
                  <td>
                    <a href="/admin/products/edit?id=<?= $product['id'] ?>" class="btn btn-primary">Edit</a>
                    <form action="/admin/products/delete" method="POST" class="d-inline">
                      <input type="hidden" name="id" value="<?= htmlspecialchars($product['id']) ?>">
                      <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                    <form action="/admin/products/toggle" method="POST" class="d-inline">
                      <input type="hidden" name="id" value="<?= htmlspecialchars($product['id']) ?>">
                      <button type="submit" class="btn <?= $product['quantity'] > 0 ? 'btn-success' : 'btn-secondary' ?>">
                        <?= $product['quantity'] > 0 ? 'Available' : 'Unavailable' ?>
                      </button>
                    </form>
                  </td>
                </tr>


              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>


        </table>
      </div>
    </div>



  </div>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>


</body>

</html>