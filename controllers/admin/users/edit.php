<?php
use core\Database;

$db = new Database();
$userId = $_GET['id'];

$user = $db->show($userId,"User");
$rooms = $db->select('Room');
return view('/admin/users/edit.view.php',['old_data'=>$user, 'rooms'=>$rooms]);
