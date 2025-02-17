<?php
require_once BASE_PATH . '/core/database.php';
use Core\Database;

$db = new Database();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id       = $_POST['id'] ?? '';
    $name     = trim($_POST['name'] ?? '');
    $price    = trim($_POST['price'] ?? '');
    $quantity = $_POST['quantity'] ?? '';

    $errors = [];
    $old_data = [
        'name'     => $name,
        'price'    => $price,
        'quantity' => $quantity,
    ];

    if (empty($name)) {
        $errors['name'] = "Please enter a product name.";
    }

    if (!is_numeric($price) || $price < 0) {
        $errors['price'] = "Please enter a valid price.";
    }

    if (!is_numeric($quantity) || (int)$quantity < 0) {
        $errors['quantity'] = "Quantity must be a non-negative number.";
    }


    $currentProduct = $db->show($id, 'product');
    if (!$currentProduct) {
        die("Product not found.");
    }

    $image_path = $currentProduct['image_url'];



    if (!isset($_FILES['product_image']) || empty($_FILES['product_image']['name'])) {
        $errors['product_image'] = "Please upload a product image.";
    } else {
        if ($_FILES['product_image']['size'] > 0) {
            $product_image = $_FILES['product_image'];

            $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'avif'];
            $image_extension = strtolower(pathinfo($product_image['name'], PATHINFO_EXTENSION));

            if (in_array($image_extension, $allowed_extensions)) {
                $destination_dir = $_SERVER['DOCUMENT_ROOT'] . '/images/';
                $destination_path = $destination_dir . basename($product_image['name']);


                if (move_uploaded_file($product_image['tmp_name'], $destination_path)) {
                    $image_path = basename($product_image['name']);
                } else {
                    $errors['product_image'] = "Error uploading the image.";
                }
            } else {
                $errors['product_image'] = "Invalid image format. Allowed: JPG, JPEG, PNG, GIF, AVIF.";
            }
        }
    }


    if (!empty($errors)) {
        header("Location: /admin/products/edit?id=" . urlencode($id) 
            . "&errors=" . urlencode(json_encode($errors))
            . "&old=" . urlencode(json_encode($old_data)));
        exit();
    }

    $updateData = [
        'name'      => $name,
        'price'     => $price,
        'quantity'  => $quantity,
        'image_url' => $image_path,
    ];

    try {
        $result = $db->update('product', $id, $updateData);
        if ($result) {
            header("Location: /admin/products");
            exit();
        } else {
            die("Failed to update product.");
        }
    } catch (Exception $e) {
        die("Error updating product: " . $e->getMessage());
    }
}
?>