<?php
use core\Database;
$db = new Database();
$rooms = $db->select('Room');

view('admin/users/create.view.php',['rooms'=>$rooms]);