<!--Screen 3-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drink Order Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../styles/admin_style.css" rel="stylesheet">

</head>
<body>

    <div class="container mt-3">
        <!-- Top Navigation Bar -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <button class="btn btn-outline-secondary me-2">Home</button>
                <button class="btn btn-outline-secondary">Orders</button>
            </div>
            <div>
                
            </div>
        </div>

        <!-- User Selection Dropdown -->

        <form action="" method="POST">
            <div class="mb-3">
                <label for="user-select" class="form-label">Select User</label>
                <select class="form-select" id="user-select" name="user">
                    <option selected disabled value="null">Choose User</option>
                    <?php foreach ($users as $user) : ?>
                        <option value="<?=$user['id']?>"><?=$user['name']?></option>
                    <?php endforeach?>
                </select>
            </div>

            <!-- Search Bar -->
            <input type="text" class="form-control" id="search-bar" placeholder="Search for a drink...">

            <div class="row">
                <!-- Drink Options -->
                <div class="col-md-8">
                    <div class="row row-cols-4 g-3">
                        <?php foreach ($products as $product) : ?>
                            <div class="col text-center drink-card" onclick="addDrinkToOrder('<?=$product["name"]?>', <?=$product['price']?>)">
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
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Your Order</h5>
                        <ul id="order-list" class="list-group mb-3">
                            <!-- Order items will appear here -->
                        </ul>
                        <div class="mb-3">
                            <label for="order-notes" class="form-label">Notes</label>
                            <textarea class="form-control" id="order-notes" rows="2" placeholder="Add any special instructions..."></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="room-select" class="form-label">Room</label>
                            <select class="form-select" id="room-select">
                                <option selected disabled value="null">Select Room</option>
                                <?php foreach ($rooms as $room) : ?>
                                    <option value="<?=$room['id']?>"><?=$room['name']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="order-total" class="form-label">Total Price</label>
                            <input type="text" class="form-control" id="order-total" value="EGP 0" readonly>
                        </div>
                        <button class="btn btn-success w-100">Confirm Order</button>
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
