<?php
require_once __DIR__ . '/../../../vendor/autoload.php';
require_once __DIR__ . '/../../../core/functions.php';

use core\Database;
use core\Validator;

try {
    $input = file_get_contents('php://input');
    $orderData = json_decode($input, true);
    // assign order data to be inserted in db
    $orders = $orderData['orders'];
    $totalPrice = $orderData['total_price'];
    $roomId = $orderData['room_id'];
    $notes = $orderData['notes'] ?? '';
    $userId = $orderData['user_id'];


    // validate the inputs
    if (!empty($orders) && is_numeric($totalPrice) && is_numeric($roomId)) {
        $db = new Database();

//        once you create the order by defult status being processing
        // notace that in db  status ENUM('processing', 'out for delivery', 'done', 'cancelled'),
        $status = 'processing';

        // update the order array or prepare it to be sent to db
        $order = [
//            'user_id' => $userId, // hard code user_id
            'user_id' => $userId,
            'total_price' => $totalPrice,
            'status' => $status, // enter the status we assigned before
            'room_id' => $roomId,
            'notes' => $notes,
        ];


        // insert the order array to the db order table
        $insertOrder = $db->insert('`order`', $order);

        // make sure if there is row efected then insert other data to order_product table
        if ($insertOrder) {
            // i crated a custom  function to get the last inserted id bt pdo=> lastInsertId()
            // look in core/Database Class File
            $orderId = $db->lastInsertId();


            foreach ($orders as $order) {
                //validate the data
                if (Validator::string($order['name']) && is_numeric($order['price']) && is_numeric($order['quantity']) && is_numeric($order['totalPrice'])) {
                    $orderProductData = [
                        'order_id' => $orderId, //assign id from cutom function i created before
                        'product_id' => $order['id'],
                        'quantity' => $order['quantity']
                    ];
                    // if all things all right then insert into order_product table
                    $insertOrderProduct = $db->insert('order_product', $orderProductData);
                    // throw an error if there is no rows effected
                    if (!$insertOrderProduct) {
                        throw new Exception("Failed to insert order product: " . json_encode($order));
                    }
                } else {
                    // throw an error if data validate return false
                    throw new Exception("Invalid order data: " . json_encode($order));
                }
            }
            // return a message to js promiss that order succefuly inserted in db
            $response = json_encode(["message" => "Order placed successfully!", "total_price" => $totalPrice]);
            echo $response;
        } else {
            throw new Exception("Failed to insert order.");
        }
    } else {
        throw new Exception("Invalid order data, total price, or room ID.");
    }
} catch (Exception $e) {
    $errorResponse = json_encode(["error" => $e->getMessage()]);
    echo $errorResponse;
}
?>
