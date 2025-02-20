<?php
require_once __DIR__ . '/../../../vendor/autoload.php';
require_once __DIR__ . '/../../../core/functions.php';
session_start();

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

//require BASE_PATH . '/views/user/catalog/index.view.php';

return view('admin/catalog/index.view.php',['user_id'=>$userId,'products'=>$products, 'rooms'=>$rooms, 'orderItems'=>$orderItems, 'latestOrder'=>$latestOrder]);