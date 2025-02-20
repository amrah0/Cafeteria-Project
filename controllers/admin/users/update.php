<?php
use core\Database;

$db = new Database();
$userId = $_POST['id'];
//dd($userId);
$userName = $_POST['name'];
$userEmail = $_POST['email'];
$userPassword = $_POST['pass'];
$userRole = $_POST['role'];
$userRoom = $_POST['room_n'];
$data = ['name'=>$userName, 'email'=>$userEmail, 'password'=>$userPassword, 'role'=>$userRole, 'room_id'=>$userRoom];
//dd($data);
$db->update("User",$userId, $data);
return redirect('/admin/users');