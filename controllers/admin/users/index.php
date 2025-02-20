<?php

use core\Database;

$db = new Database();
$users = $db->select('User');

return view('admin/users/index.view.php',['users'=>$users]);