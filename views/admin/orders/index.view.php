<!-- screen 10 -->

<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/styles/order.css">
    <style>
        .order-item img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 5px;
        }
    </style>
    <script
            src="https://kit.fontawesome.com/ff0d0c2aec.js"
            crossorigin="anonymous"></script>
</head>
<body class="bg-light">

<div class="container mt-4">
    <?php require base_path('views/partials/nav.php')?>

    <h2 class="mb-3">Orders</h2>

    <?php foreach ($orders as $order): ?>
        <div class="order-container">
            <div class="order-header d-flex justify-content-between align-items-center">
                <strong>Order Date:</strong> <?= htmlspecialchars($order['created_at']) ?>
                <strong>Name:</strong> <?= htmlspecialchars($order['user_name']) ?>
                <strong>Room:</strong> <?= htmlspecialchars($order['room_name']) ?>
                <strong>Status:</strong>
                <span class="<?= $order['status'] == 'processing' ? 'status-processing' : 'status-delivered' ?>">
                        <?= ucfirst($order['status']) ?>
                    </span>
            </div>

            <div class="order-items">
                <?php foreach ($orderItems[$order['id']] as $item): ?>
                    <div class="order-item">
                        <img class="w-10" src="/Images/<?= htmlspecialchars($item['image_url']) ?>" alt="<?= htmlspecialchars($item['name']) ?>">
                        <p><?= htmlspecialchars($item['name']) ?></p>
                        <p><strong><?= htmlspecialchars($item['price']) ?> LE</strong></p>
                        <p>Qty: <?= htmlspecialchars($item['quantity']) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="text-end me-3">
                <strong>Total: <?= htmlspecialchars($order['total_price']) ?> LE</strong>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>