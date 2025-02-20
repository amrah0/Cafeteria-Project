<?php

use core\Database;
$db = new Database();
$products = $db->select('Product');

require view('admin/products/index.view.php',['products'=>$products]);
