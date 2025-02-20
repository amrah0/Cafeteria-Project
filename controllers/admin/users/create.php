<?php
require_once __DIR__ . '/../../../vendor/autoload.php';
require_once __DIR__ . '/../../../core/functions.php';

use core\Database;
use core\Validator;


try {
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['pass'];
$room = $_POST['room_n'];
$image = $_FILES['image']['name'];
$image_size = $_FILES['image']['size'];
$role =$_POST['role'];

if (Validator::string($name) && validator::email($email) && $room ) {
    $imageName =  time() . "_" . $image;
    // Move Pic From tmp To Images Folder
    $imagMove = move_uploaded_file($_FILES['image']['tmp_name'], '../../../Images/' . $imageName);
    // If No Image change it To null
    if (!$imagMove) {
        $imageName = null;
    }
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $data=[
        'name' => $name,
        'email' => $email,
        'password' => $hashedPassword,
        'room_id' => $room,
        'image_url' => $imageName,
        'role' => $role
    ];
    $db = new Database();
    $insert = $db->insert('user', $data);

    if ($insert) {

        header("Location: /Cafeteria-Project/views/admin/users/create.view.php?success=true");
        exit;
    }else{
        redirect('/Cafeteria-Project/views/admin/users/create.view.php?error=1');
        exit();
    }

}
else{
    $errors = [];
    $old = [];

    foreach ($_POST as $key => $value) {
        if (! $value){
            $errors[$key] = "Please enter a {$key}";
        }else{
            $old[$key] = $value;
            $old['pass'] ="";
        }
    }
    if(!$_FILES['image']['name']){
        $errors['image'] = "Please select a image";
    }


    $errors = json_encode($errors);

   $url = "/Cafeteria-Project/views/admin/users/create.view.php?error={$errors}";
    if(count($old)){
        $old = json_encode($old);
        $url  = "{$url}&old={$old}";
    }
    redirect("$url");
}


}catch (Exception $e) {
    echo $e->getMessage();
    return false;

}




