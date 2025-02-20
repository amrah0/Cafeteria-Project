<!--Screen 9-->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Checks</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="../../styles/products.css" />
  <script
    src="https://kit.fontawesome.com/ff0d0c2aec.js"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="/styles/checks_s9.css" />
</head>
<body>
<div class="container">
    <nav class="navbar bg-body-tertiary">
      <div class="container-fluid">


        <div class="d-flex">
        <a href="/admin/catalog" class="btn btn-outline-success me-2"><i class="fa-solid fa-house"></i> Home</a>
        <a href="/views/admin/products/index.view.php" class="btn btn-outline-success me-2  "><i class="fa-solid fa-store "></i> Products</a>
          <a href="" class="btn btn-outline-success me-2 "><i class="fa-solid fa-user"></i> Users</a>
          <a href="" class="btn btn-outline-success me-2"><i class="fa-solid fa-cart-shopping"></i> Manual Order</a>
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

    <div class="container mt-4">
      <h2>Checks</h2>

      <form method="GET" action="/admin/checks">
        <div class="row mb-3">
          <div class="col-md-3">
            <label for="fromDate">From:</label>
            <input type="date" id="fromDate" name="fromDate" class="form-control" value="<?= htmlspecialchars($fromDate) ?>">
          </div>
          <div class="col-md-3">
            <label for="toDate">To:</label>
            <input type="date" id="toDate" name="toDate" class="form-control" value="<?= htmlspecialchars($toDate) ?>">
          </div>
          <div class="col-md-3">
            <label for="userFilter">Filter by User:</label>
            <select id="userFilter" name="userFilter" class="form-select">
              <option value="all" <?= ($userFilter==='all') ? 'selected' : '' ?>>All Users</option>
              <?php foreach ($users as $user): ?>
                <option value="<?= $user['id'] ?>" <?= ($userFilter == $user['id']) ? 'selected' : '' ?>>
                  <?= htmlspecialchars($user['name']) ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-md-3 d-flex align-items-end">
            <button type="submit" class="btn btn-primary w-100">Apply Filter</button>
          </div>
        </div>
      </form>

      <!-- Users Table -->
      <h3>Users</h3>
      <?php if (!empty($filteredUsers)): ?>
        <div class="row m-2">
          <div class="col-12 table-responsive">
            <table class="table table-striped table-hover table-bordered text-center">
              <thead>
                <tr>
                  <th>Username</th>
                  <th>Total Price</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($filteredUsers as $user): ?>
                  <tr>
                    <td>
                      <a href="/admin/checks?userFilter=<?= htmlspecialchars($userFilter) ?>&selectedUserId=<?= $user['id'] ?>&fromDate=<?= urlencode($fromDate) ?>&toDate=<?= urlencode($toDate) ?>">
                        <?= htmlspecialchars($user['name']) ?>
                      </a>
                    </td>
                    <td>
                      <?= ($user['total_price'] > 0) ? number_format($user['total_price'], 2) : "Cancelled/No Order" ?>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      <?php else: ?>
        <p class="text-center">No users ordered at this time.</p>
      <?php endif; ?>

      <!-- Orders Table (displayed only if an active user is set) -->
      <?php if (!empty($activeUserId)): ?>
        <?php
          $activeUserArr = array_filter($users, function($user) use ($activeUserId) {
            return $user['id'] == $activeUserId;
          });
          $activeUser = array_shift($activeUserArr);
        ?>
        <h3>Orders for User: <?= htmlspecialchars($activeUser['name'] ?? 'Unknown User') ?></h3>
        <?php if (!empty($orders)): ?>
          <div class="row m-2">
            <div class="col-12 table-responsive">
              <table class="table table-striped table-hover table-bordered text-center">
                <thead>
                  <tr>
                    <th>Order Date</th>
                    <th>Total Price</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($orders as $order): ?>
                    <tr>
                      <td>
                        <a href="/admin/checks?userFilter=<?= htmlspecialchars($userFilter) ?>&selectedUserId=<?= htmlspecialchars($activeUserId) ?>&selectedOrderId=<?= $order['id'] ?>&fromDate=<?= urlencode($fromDate) ?>&toDate=<?= urlencode($toDate) ?>">
                          <?= htmlspecialchars($order['created_at']) ?>
                        </a>
                      </td>
                      <td><?= number_format($order['total_price'], 2) ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        <?php else: ?>
          <p class="text-center">
            <?php if ($applyTimeFilter) : ?>
              The user hasn't ordered in this time.
            <?php else: ?>
              No orders found.
            <?php endif; ?>
          </p>
        <?php endif; ?>
      <?php endif; ?>

      <!-- Products Table (displayed only if a specific order is selected) -->
      <?php if (!empty($selectedOrderId)): ?>
        <h3>Products for Order: <?= htmlspecialchars($selectedOrderId) ?></h3>
        <?php if (!empty($products)): ?>
          <div class="row m-2">
            <div class="col-12 table-responsive">
              <table class="table table-striped table-hover table-bordered text-center">
                <thead>
                  <tr>
                    <th>Product Image &amp; Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total Price</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($products as $product): ?>
                    <tr>
                      <td>
                        <img src="<?= htmlspecialchars($product['image_url']) ?>" alt="Product Image" width="100"><br>
                        <?= htmlspecialchars($product['name']) ?>
                      </td>
                      <td><?= $product['quantity'] ?></td>
                      <td><?= number_format($product['price'], 2) ?></td>
                      <td><?= number_format($product['total_price'], 2) ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        <?php else: ?>
          <p class="text-center">No products found for this order.</p>
        <?php endif; ?>
      <?php endif; ?>

    </div>
  </div> <!-- End outer container -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
