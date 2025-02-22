<?php
session_start();
//if (!isset($_SESSION['user'])) {
//    header('Location: /login');
//}
//if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] != 'admin') {
//    header('Location: /');
//}

use core\Database;
$db = new Database();
$categories = $db->select('Category');

view('admin/products/create.view.php',['categories'=>$categories]);