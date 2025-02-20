<?php
session_start();
require_once __DIR__ . '/../../../../core/Database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: /user/orders");
    exit;
}

if (!isset($_POST['order_id']) || !isset($_SESSION['user_id'])) {
    die("Unauthorized access.");
}

$db = new Database();
$order_id = $_POST['order_id'];
$user_id = $_SESSION['user_id'];

// التأكد من أن الطلب يخص المستخدم وأنه قيد المعالجة
$order = $db->fetch("SELECT * FROM `order` WHERE id = ? AND user_id = ? AND status = 'processing'", [$order_id, $user_id]);

if (!$order) {
    die("Order not found or cannot be canceled.");
}

// تحديث حالة الطلب إلى "canceled"
$db->execute("UPDATE `order` SET status = 'canceled' WHERE id = ?", [$order_id]);

// إعادة التوجيه إلى صفحة الطلبات بعد الإلغاء
header("Location: /user/orders");
exit;
