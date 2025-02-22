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
       if ($user['email'] === $email and $user['password'] === $password ? $userExists = true : ''){
           // some small enhancements to code to benefit us in the project => amrah0
           $loggedInUser = $user; // after user found
           break; // Stops loop once the user is found in db
       }
    }

    if ($userExists) {
        // declaring the user data once he/she logged in
        $_SESSION['email'] = $loggedInUser['email'];
        $_SESSION['login'] = true;
        $_SESSION['user_id'] = $loggedInUser['id'];
        $_SESSION['user_name'] = $loggedInUser['name'];
        $_SESSION['user_role'] = $loggedInUser['role'];

        // according the user role redirct to his page rather user is admin Or user
        if ($_SESSION['user_role'] === 'admin') {
            header("Location: /admin/catalog");

        }else{
            header("Location: /");

        }

    } else {
        $invalid = "Invalid Email or Password";
        $invalid = json_encode($invalid);
        $url = "Location: /login?invalid={$invalid}&email={$email}";
        header($url);
    }
}


checkLogin($email, $password);
