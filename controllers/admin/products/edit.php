<?php
use Core\Database;


require base_path('core/database.php');

$db = new Database();

$productId = $_GET['id'] ?? null;

if ($productId) {
    $product = $db->show($productId, 'product');
    if (!$product) {
        die('Product not found.');
    }
} else {
    die('Product ID is missing.');
}


view('admin/products/edit.view.php', ['product' => $product]);
