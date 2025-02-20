<?php
use core\Database;

$userId = $_POST['id'];
$db = new Database();
$user = $db->delete($userId, 'User');


$users = $db->select('User');
return view('admin/users/index.view.php', ['users' => $users]);

