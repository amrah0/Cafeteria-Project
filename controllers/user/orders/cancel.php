<?php
require_once __DIR__ . '/../../../vendor/autoload.php';

use core\Database;
var_dump($_POST);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['order_id'])) {
    $db = new Database();
    $orderId = $_POST['order_id'];
    $data= [
        "status" => 'cancelled',
    ];
    $table = "`order`";
    $db->update($table,$orderId,$data);
    header("Location: /views/user/orders");
}