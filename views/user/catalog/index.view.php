<!--Screen 2-->
<?php
session_start();
require_once __DIR__ . '/../../../vendor/autoload.php';

use core\Database;
$db = new Database();
$userId = $_SESSION['user_id'];
//var_dump($userId);
$products = $db->select('product');
$rooms = $db->select('room');
$query = "
    SELECT `Order`.id AS order_id, `Order`.created_at, `Order`.total_price, `Order`.status, 
           User.id AS user_id, User.name AS user_name, Room.name AS room_name
    FROM `Order`
    JOIN User ON `Order`.user_id = User.id
    JOIN Room ON `Order`.room_id = Room.id
    WHERE `Order`.user_id = ?
    ORDER BY `Order`.created_at DESC
    LIMIT 5";
$latestOrder = $db->fetchAll($query, [$userId]);
$orderItems = [];
foreach ($latestOrder as $order) {
    $orderId = $order['order_id'];
    $query = "
        SELECT Product.name, Product.price, Product.image_url, Order_Product.quantity
        FROM Order_Product
        JOIN Product ON Order_Product.product_id = Product.id
        WHERE Order_Product.order_id = ?";
    $orderItems[$orderId] = $db->fetchAll($query, [$orderId]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drink Order Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../styles/homepage_s2.css" rel="stylesheet">

</head>
<body>
<!--    //   hidden input to store user id from session-->
    <input type="hidden" id="user-id" value="<?php echo $_SESSION['user_id']; ?>">


    <div class="container mt-3">
        <!-- Top Navigation Bar -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <button class="btn btn-outline-secondary me-2">Home</button>
                <button class="btn btn-outline-secondary">Orders</button>
            </div>
           
        </div>

        <!-- Search Bar -->
        <input type="text" class="form-control" id="search-bar" placeholder="Search for a drink...">

        <div class="row">
            <!-- Drink Options -->
            <div class="col-md-8">
                <div class="row row-cols-4 g-3">
<!--                    // customize addDrinkToOrder function to Take One Additional Argument where refere to product ID-->
                    <?php foreach ($products as $product): ?>
                        <div class="col text-center drink-card" onclick="addDrinkToOrder('<?=$product['name']?>', <?= $product['price']?>,<?= $product['id']?>)">
                            <img src="/Images/<?=$product['image_url']?>" class="img-fluid mb-2" alt="Tea">
                            <p><?=$product['name']?></p>
                            <p class="text-muted">EGP <?= $product['price']?></p>
                        </div>
                   <?php endforeach; ?>

                </div>
            </div>

            <!-- Order Summary -->
            <div class="col-md-4">
                <!-- Search Bar Above Order Summary -->
                
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Your Order</h5>
                        <ul id="order-list" class="list-group mb-3">
                            <!-- Order items will appear here -->
                        </ul>
                        <div class="mb-3">
                            <label for="order-notes" class="form-label">Notes</label>
                            <textarea class="form-control" id="order-notes" rows="2" placeholder="Add any special instructions..."></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="room-select" class="form-label">Room</label>
                            <select class="form-select" id="room-select">
                                <option value="">Select Room</option>
                                <?php foreach ($rooms as $room): ?>
                                    <option value="<?= $room['id']?>"><?=$room['name'] ?></option>
                                <?php endforeach; ?>

                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="order-total" class="form-label">Total Price</label>
                            <input type="text" class="form-control" id="order-total" value="EGP 0" readonly>
                        </div>
                        <div id="warning"></div>
<!--                        <form method="post" action="/controllers/user/catalog/create.php">-->
                        <button class="btn btn-success w-100" onclick="PlaceOrder()">Confirm Order</button>
<!--                        </form>-->
                    </div>
                </div>
            </div>
        </div>

        <!-- Latest Order -->
        <div class="mt-4">
            <h4>Latest Orders</h4>
            <?php if (!empty($latestOrder)): ?>
                <?php foreach ($latestOrder as $order): ?>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Order Date: <?= htmlspecialchars($order['created_at']) ?></h5>
                            <p>User: <?= htmlspecialchars($order['user_name']) ?></p>
                            <p>Room: <?= htmlspecialchars($order['room_name']) ?></p>
                            <p>Status: <span class="<?= $order['status'] == 'processing' ? 'status-processing' : 'status-delivered' ?>"><?= ucfirst($order['status']) ?></span></p>
                            <h6>Items:</h6>
                            <ul>
                                <?php foreach ($orderItems[$order['order_id']] as $item): ?>
                                    <li><?= htmlspecialchars($item['name']) ?> - <?= htmlspecialchars($item['quantity']) ?> x EGP <?= htmlspecialchars($item['price']) ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <p><strong>Total: EGP <?= htmlspecialchars($order['total_price']) ?></strong></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No recent orders yet.</p>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../../scripts/homepage_s2.js"></script>
    
</body>
</html>
