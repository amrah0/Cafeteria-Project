<?php


require_once BASE_PATH . '/core/database.php';

use Core\Database;

$db = new Database();
$products = $db->select('product');

require BASE_PATH . '/views/admin/products/index.view.php';
