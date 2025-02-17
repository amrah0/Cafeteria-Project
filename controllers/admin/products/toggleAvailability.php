<?php
if (!defined('BASE_PATH')) {
    define('BASE_PATH', dirname(dirname(dirname(__DIR__))));
}

require_once BASE_PATH . '/core/database.php';

use Core\Database;

$db = new Database();
$id = $_POST['id'] ?? null;
$message = "";

if ($id) {
    $product = $db->show($id, 'product');
    if ($product) {
        if ($product['quantity'] > 0) {
            $message = "This product is available with quantity: " . $product['quantity'] . ".";
        } else {
            $message = "This product is not available. Quantity is 0.";
        }
    } else {
        $message = "Product not found.";
    }
} else {
    $message = "No product ID provided.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Availability</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            height: 100vh;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
        }
        .message-box {
            max-width: 500px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="message-box text-center">
        <div class="alert alert-info" role="alert">
            <?= htmlspecialchars($message) ?>
        </div>
        <a href="/admin/products" class="btn btn-primary">Back to Products</a>
    </div>
</body>
</html>
