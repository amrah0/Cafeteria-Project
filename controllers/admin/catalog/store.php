<?php
use core\Database;
// In order table: user_id, total, status, room, notes
//dd($_POST);

$userId = $_POST['user'] ?? '';
$total = explode(' ',$_POST['total'])[1] ?? ''; // the total is sent as 'EGP price', we split the string and take only the integer
$note = $_POST['note']?? '';
$room = $_POST['room']?? '';
$status = 'processing'?? '';

$products = $_POST['product_id'] ?? ''; // array of product ids
$quantity = $_POST['quantity'] ?? ''; // ***
$price = $_POST['price'] ?? '';

$errors = [];
$old    = [];

try {
    if ($userId && $room && $total) {

        $db = new Database();
        $orderId = $db->insert('`Order`', ['user_id'=>$userId, 'room_id'=>$room, 'total_price'=>$total, 'notes'=>$note, 'status'=>$status]);

        foreach ($products as $index => $product) {
            $db->insert('`Order_Product`', ['order_id'=>$orderId, 'product_id'=>$product, 'quantity'=>$quantity[$index]]);
        }

        header("Location: /admin/catalog");
        exit();

    } else {
        throw new Exception("Please fill in all fields");
    }
} catch (Exception $e) {
    // echo $e->getMessage();
    // TODO: customize the error message to be grammatically correct
    // depending on the form field
    foreach ($_POST as $key => $value) {
        if (! $value) {
            $errors[$key] = "Please enter a {$key}";
        } else {
            $old[$key] = $value;
        }
    }

    $errors = json_encode($errors);

    $url = "Location: /admin/catalog?errors={$errors}";

    if (count($old)) {
        $old = json_encode($old);
        $url = "{$url}&old={$old}";
    }

    header($url);
    exit();
}