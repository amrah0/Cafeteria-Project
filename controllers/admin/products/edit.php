<?php
use core\Database;


//require_once BASE_PATH . 'core/Database.php';

$db = new Database();

$productId = $_GET['id'] ?? null;

if ($productId) {
    $product = $db->show($productId, 'Product');
    if (!$product) {
        die('Product not found.');
    }
} else {
    die('Product ID is missing.');
}


view('admin/products/edit.view.php', ['product' => $product]);
