<?php
require_once __DIR__ . '/../../../vendor/autoload.php';
require_once __DIR__ . '/../../../core/functions.php';
use core\Database;
use core\Validator;



try {
    $productName = $_POST['product-name'];
    $productPrice = $_POST['price'];
    $category = $_POST['category'];
    $image = $_FILES['product-picture']['name'];
    $imageSize = $_FILES['product-picture']['size'];


// check if all entries return True bool
    if (Validator::string($productName) and $productPrice and $category and $image and $imageSize) {
        // Rename Image With Time_imagename
        $imageName =  time() . "_" . $image;
        // Move Pic From tmp To Images Folder
        $imagMove = move_uploaded_file($_FILES['product-picture']['tmp_name'], '../../../Images/' . $imageName);
        // If No Image change it To null
        if (!$imagMove) {
            $imageName = null;
        }
        $data=[
            'name' => $productName,
            'price' => $productPrice,
            'category_id' => $category,
            'image_url' => $imageName,
        ];
        $db = new Database();
        $insert = $db->insert('Product', $data);

        if ($insert) {
//            $baseUrl =  $_SERVER['HTTP_HOST'] . "/Cafeteria-Project";
            header("Location: /admin/products/create?success=true");
            exit;
        }else{
            redirect('/admin/products/create?error=1');
            exit();
        }

        }
    else{
        redirect('/admin/products/create?error=missing');
    }

} catch (Exception $e) {
    echo $e->getMessage();
    return false;

}