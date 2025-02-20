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
        <div class="mb-3">
            <label for="user-select" class="form-label">Select User</label>
            <select class="form-select" id="user-select">
                <option value="">Choose User</option>
                <option value="user1">User 1</option>
                <option value="user2">User 2</option>
                <option value="user3">User 3</option>
            </select>
        </div>

        <!-- Search Bar -->
        <input type="text" class="form-control" id="search-bar" placeholder="Search for a drink...">

        <div class="row">
            <!-- Drink Options -->
            <div class="col-md-8">
                <div class="row row-cols-4 g-3">
                    <div class="col text-center drink-card" onclick="addDrinkToOrder('Tea', 10)">
                        <img src="../../../Images/tea.png" class="img-fluid mb-2" alt="Tea">
                        <p>Tea</p>
                        <p class="text-muted">EGP 10</p>
                    </div>
                    <div class="col text-center drink-card" onclick="addDrinkToOrder('Coffee', 15)">
                        <img src="../../../Images/coffeee.jpeg" class="img-fluid mb-2" alt="Coffee">
                        <p>Coffee</p>
                        <p class="text-muted">EGP 15</p>
                    </div>
                    <div class="col text-center drink-card" onclick="addDrinkToOrder('Espresso', 20)">
                        <img src="../../../Images/espresso.jpg" class="img-fluid mb-2" alt="Espresso">
                        <p>Espresso</p>
                        <p class="text-muted">EGP 20</p>
                    </div>
                    <div class="col text-center drink-card" onclick="addDrinkToOrder('Cappuccino', 25)">
                        <img src="../../../Images/cappuccino.png" class="img-fluid mb-2" alt="Cappuccino">
                        <p>Cappuccino</p>
                        <p class="text-muted">EGP 25</p>
                    </div>
                    <div class="col text-center drink-card" onclick="addDrinkToOrder('Latte', 30)">
                        <img src="../../../Images/latte.jpg" class="img-fluid mb-2" alt="Latte">
                        <p>Latte</p>
                        <p class="text-muted">EGP 30</p>
                    </div>
                    <div class="col text-center drink-card" onclick="addDrinkToOrder('Hot Chocolate', 25)">
                        <img src="../../../Images/Hot%20Chocolate.jpeg" class="img-fluid mb-2" alt="Hot Chocolate">
                        <p>Hot Chocolate</p>
                        <p class="text-muted">EGP 25</p>
                    </div>
                    <div class="col text-center drink-card" onclick="addDrinkToOrder('Green Tea', 12)">
                        <img src="../Images/green-tea.png" class="img-fluid mb-2" alt="Green Tea">
                        <p>Green Tea</p>
                        <p class="text-muted">EGP 12</p>
                    </div>
                    <div class="col text-center drink-card" onclick="addDrinkToOrder('Iced Coffee', 18)">
                        <img src="../../../Images/Iced%20Coffeejpeg.jpeg" class="img-fluid mb-2" alt="Iced Coffee">
                        <p>Iced Coffee</p>
                        <p class="text-muted">EGP 18</p>
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
                                <option value="">Select Room</option>
                                <option value="101">Room 101</option>
                                <option value="102">Room 102</option>
                                <option value="103">Room 103</option>
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
