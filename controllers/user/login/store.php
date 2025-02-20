<?php

use core\Database;
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$errors = [];

function checkLogin($email, $password)
{
    $db = new Database();
    $users = $db->select('User');
    $userExists = false;
    foreach ($users as $user) {
        $user['email'] === $email and $user['password'] === $password ? $userExists = true : '';
    }

    if ($userExists) {

        $_SESSION['email'] = $email;
        $_SESSION['login'] = true;

        header("Location: /admin/catalog");

    } else {
        $invalid = "Invalid Email or Password";
        $invalid = json_encode($invalid);
        $url = "Location: /login?invalid={$invalid}&email={$email}";
        header($url);
    }
}


checkLogin($email, $password);
