<!--Screen 5-->
<?php

use Core\Database;

if (!defined('BASE_PATH')) {
  define('BASE_PATH', dirname(dirname(dirname(__DIR__))));
}

require_once BASE_PATH . '/core/database.php';


$db = new Database();
$products = $db->select('product');
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
    <nav class="navbar bg-body-tertiary">
      <div class="container-fluid">


        <div class="d-flex">
        <a href="/admin/catalog" class="btn btn-outline-success me-2"><i class="fa-solid fa-house"></i> Home</a>
        <a href="/views/admin/products/index.view.php" class="btn btn-outline-success me-2  "><i class="fa-solid fa-store "></i> Products</a>
          <a href="/views/admin/users/index.view.php" class="btn btn-outline-success me-2 "><i class="fa-solid fa-user"></i> Users</a>
          <a href="/views/admin/orders/index.view.php" class="btn btn-outline-success me-2"><i class="fa-solid fa-cart-shopping"></i> Manual Order</a>
          <a href="/admin/checks" class="btn btn-outline-success"> <i class="fa-solid fa-money-check-dollar"></i> Checks</a>
        
        </div>

        <div class="dropdown ms-auto">
          <a
            href=""
            class="btn btn-secondary dropdown-toggle"
            data-bs-toggle="dropdown"
            aria-expanded="false">
            <i class="fa-solid fa-user-tie"></i>Admin
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#">Change Password</a></li>
            <li><a class="dropdown-item" href="#">LogOut</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="row m-2">
      <div class="col">
        <h1 class="">All Product</h1>

      </div>
      <div class="col text-end">
        <a href="/views/admin/products/create.view.php">Add Product</a>
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
                    <img src="/images/<?= htmlspecialchars($product['image_url']) ?>" alt="Product Image" style="width: 80px; height: 80px;">
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