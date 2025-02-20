<?php
require_once 'core/Database.php';

class OrderController {
    public function index() {
        $db = new Database();
        $orders = $db->query("SELECT * FROM orders ORDER BY order_date DESC")->fetchAll();
        include 'views/user/orders/index.view.php';
    }

    public function cancel() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['order_id'])) {
            $db = new Database();
            $orderId = $_POST['order_id'];
            $db->query("UPDATE orders SET status = 'Cancelled' WHERE id = ?", [$orderId]);
            header("Location: /user/orders");
        }
    }
}

require '../../views/user/orders/index.view.php';
?>
