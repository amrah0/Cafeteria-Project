<?php

require_once __DIR__ . '../../../vendor/autoload.php';

use core\Database;

$database = new Database();

// Fetch orders with user and room details
$query = "
    SELECT `Order`.id, `Order`.created_at, `Order`.total_price, `Order`.status, 
           User.name AS user_name, Room.name AS room_name, Room.id AS room_id
    FROM `Order`
    JOIN User ON `Order`.user_id = User.id
    JOIN Room ON `Order`.room_id = Room.id
    ORDER BY `Order`.created_at DESC";

$orders = $database->fetchAll($query);

// Fetch order items for each order
$orderItems = [];
foreach ($orders as $order) {
    $orderId = $order['id'];
    $query = "
        SELECT Product.name, Product.price, Product.image_url, Order_Product.quantity
        FROM Order_Product
        JOIN Product ON Order_Product.product_id = Product.id
        WHERE Order_Product.order_id = ?";
    
    $orderItems[$orderId] = $database->fetchAll($query, [$orderId]);
}

// Load the view
require '../../views/admin/orders/index.view.php';
?>
