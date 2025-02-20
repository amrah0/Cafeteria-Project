<?php


require_once BASE_PATH . '/core/database.php';

use Core\Database;

$database = new Database();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Create a temporary PDO connection to check constraints (fk order_product) 
    $dsn = "mysql:host=" . \Core\Database::DB_HOST . ";dbname=" . \Core\Database::DB_NAME;
    try {
        $pdo = new PDO($dsn, \Core\Database::DB_USER, \Core\Database::DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }

    $productQuery = "SELECT quantity FROM Product WHERE id = :product_id";
    $stmt = $pdo->prepare($productQuery);
    $stmt->bindValue(':product_id', $id);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$product) {
        die("Product not found.");
    }


    $checkQuery = "SELECT COUNT(*) AS count FROM Order_Product WHERE product_id = :product_id";
    $stmt = $pdo->prepare($checkQuery);
    $stmt->bindValue(':product_id', $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result['count'] > 0) {
        $message = "This product has already been ordered and cannot be deleted.";
    } elseif ($product['quantity'] > 0) {
        $message = "This product has available quantity and cannot be deleted.";
    } else {

        if ($database->delete($id, 'product')) {
            header("Location: /admin/products");
            exit();
        } else {
            $message = "Failed to delete product.";
        }
    }
} else {
    header("Location: /admin/products");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cannot Delete Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            height: 100vh;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
        }
        .message-box {
            max-width: 500px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="message-box text-center">
        <div class="alert alert-danger" role="alert">
            <?= htmlspecialchars($message) ?>
        </div>
        <a href="/admin/products" class="btn btn-primary">Back to Products</a>
    </div>
</body>
</html>
