<!-- screen 4 -->
<!-- My Orders Page -->
<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/styles/userorders.css">
</head>
<body>

<div class="container">
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <div class="d-flex">
                <a href="/" class="btn btn-outline-success me-2"><i class="fa-solid fa-house"></i> Home</a>
                <a href="/user/orders" class="btn btn-outline-success me-2 active"><i class="fa-solid fa-cart-shopping"></i> My Orders</a>
            </div>
            <div class="dropdown ms-auto">
                <a href="#" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fa-solid fa-user"></i>
                    <?php
                    echo $_SESSION['user_role'];
                    ?>


                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#"><?php echo $_SESSION['email'] ?></a></li>
                    <li><a class="dropdown-item" href="/logout">LogOut</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="row m-2">
        <div class="col-12">
            <h1 class="text-body-primary">My Orders</h1>
        </div>
    </div>

    <div class="row m-2">
        <div class="col-12 table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                <tr class="table-dark">
                    <th>Order Date</th>
                    <th>Show</th>
                    <th>Status</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?= date("Y/m/d h:i A", strtotime($order['created_at'])) ?></td>
                        <td><a href="#" class="btn btn-primary" onclick="show()">Show</a></td>
                        <td><?= htmlspecialchars($order['status']) ?></td>
                        <td><?= htmlspecialchars($order['total_price']) ?> EGP</td>
                        <td>
                            <?php if ($order['status'] == 'processing'): ?>
                                <form method="POST" action="/controllers/user/orders/cancel.php">
                                    <input type="hidden" name="order_id" value="<?= $order['id'] ?>">
                                    <button type="submit" class="btn btn-danger">Cancel</button>
                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>