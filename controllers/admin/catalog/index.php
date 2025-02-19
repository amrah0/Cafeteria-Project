<?php

use core\Database;
$db = new Database();
$users = $db->select('User');
$products = $db->select('Product');
$rooms = $db->select('Room');
return view('admin/catalog/index.view.php',['users'=>$users,'products'=>$products, 'rooms'=>$rooms]);