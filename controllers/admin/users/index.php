<?php
use core\Database;
$db = new Database();
$rooms = $db->select('room');

return view('users/catalog/index.view.php',['rooms'=>$rooms]);