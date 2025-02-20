<!--Screen 3-->
<?php

if (isset($_GET["errors"])) {
    $errors = json_decode($_GET['errors'], true);
    extract($errors);
}
//dd($errors);
if (isset($_GET["old"])) {
    $old_data = json_decode($_GET["old"], true);
    extract($old_data, EXTR_PREFIX_ALL, 'old');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drink Order Page</title>
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />
    <script
    src="https://kit.fontawesome.com/ff0d0c2aec.js"
    crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../styles/admin_style.css" rel="stylesheet">

</head>
<body>
<!--TODO: Find a way to send the products data to the required controller to save in the db.-->
<!-- decide on what should be submitted-->
<div class="container">
    <nav class="navbar bg-body-tertiary">
      <div class="container-fluid">


        <div class="d-flex">
        <a href="/admin/catalog" class="btn btn-outline-success me-2"><i class="fa-solid fa-house"></i> Home</a>
        <a href="/views/admin/products/index.view.php" class="btn btn-outline-success me-2  "><i class="fa-solid fa-store "></i> Products</a>
          <a href="/views/admin/users/index.view.php" class="btn btn-outline-success me-2 "><i class="fa-solid fa-user"></i> Users</a>
          <a href="/views/admin/orders/index.view.php" class="btn btn-outline-success me-2"><i class="fa-solid fa-cart-shopping"></i> Manual Order</a>
          <a href="/admin/checks" class="btn btn-outline-success"> <i class="fa-solid fa-money-check-dollar"></i> Checks</a>
        
        </div>

        <div class="dropdown ms-auto">
          <a
            href=""
            class="btn btn-secondary dropdown-toggle"
            data-bs-toggle="dropdown"
            aria-expanded="false">
            <i class="fa-solid fa-user-tie"></i>Admin
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#">Change Password</a></li>
            <li><a class="dropdown-item" href="#">LogOut</a></li>
          </ul>
        </div>
      </div>
    </nav>

        <!-- User Selection Dropdown -->

        <form  method="POST">
            <div class="mb-3">
                <label for="user-select" class="form-label m-2">Select User</label>
                <select class="form-select" id="user-select" name="user">
                    <option selected value="">Choose User</option>
                    <?php foreach ($users as $user) : ?>
                        <option value="<?=$user['id']?>" name="user"><?=$user['name']?></option>
                    <?php endforeach?>
                </select>
                <p class="text-danger"><?= $errors['user'] ?? '' ?></p>
            </div>

            <!-- Search Bar -->
            <input type="text" class="form-control" id="search-bar" placeholder="Search for a drink...">

            <div class="row">
                <!-- Drink Options -->
                <div class="col-md-8">
                    <div class="row row-cols-4 g-3">
                        <?php foreach ($products as $product) : ?>
                            <div class="col text-center drink-card" onclick="addDrinkToOrder('<?=$product["name"]?>', <?=$product["price"]?>, '<?=$product["id"]?>')">
                                <img src="../../../Images/<?=$product['image_url']?>" class="img-fluid mb-2" alt="Tea">
                                <p><?=$product['name']?></p>
                                <p class="text-muted"><?=$product['price']?></p>
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="col-md-4">
                <div class="card" id ="your-order">
                    <div class="card-body">
                        <h5 class="card-title">Your Order</h5>
                        <ul id="order-list" class="list-group mb-3">
                            <!-- Order items will appear here -->
                        </ul>
                        <div class="mb-3">
                            <label for="order-notes" class="form-label">Notes</label>
                            <textarea name="note" class="form-control" id="order-notes" rows="2" placeholder="Add any special instructions..."></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="room-select" class="form-label">Room</label>
                            <select name="room" class="form-select" id="room-select">
                                <option selected value="">Select Room</option>
                                <?php foreach ($rooms as $room) : ?>
                                    <option value="<?=$room['id']?>"><?=$room['name']?></option>
                                <?php endforeach;?>
                            </select>
                            <p class="text-danger"><?= $errors['room'] ?? ''?></p>
                        </div>
                        <div class="mb-3">
                            <label for="order-total" class="form-label">Total Price</label>
                            <input type="text" name="total" class="form-control" id="order-total" value="EGP 0" readonly>
                        </div>
                        <input type="submit" class="btn btn-success w-100" id="submit-order">Confirm Order</input>
                    </div>
                </div>
            </div>
    </div>
        </form>

        <!-- Latest Order -->
        <div class="mt-4">
            <h4>Latest Order</h4>
            <div class="card">
                <div class="card-body">
                    <p>No recent orders yet.</p>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../../scripts/admin_script.js"></script>
    
</body>
</html>
