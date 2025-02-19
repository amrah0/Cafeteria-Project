<!--Screen 2-->
<?php
require_once __DIR__ . '/../../../vendor/autoload.php';

use core\Database;
$db = new Database();
$products = $db->select('product');
$rooms = $db->select('room');
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
                                <option value="101">Room 101</option>
                                <option value="102">Room 102</option>
                                <option value="103">Room 103</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="order-total" class="form-label">Total Price</label>
                            <input type="text" class="form-control" id="order-total" value="EGP 0" readonly>
                        </div>
                        <button class="btn btn-success w-100">Confirm Order</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Latest Order -->
        <div class="mt-4">
            <h4>Latest Order</h4>
            <div class="card">
                <div class="card-body">
                    <p>No recent orders yet.</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../../scripts/homepage_s2.js"></script>
    
</body>
</html>
