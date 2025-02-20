<!--Screen 10-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />
    <script
    src="https://kit.fontawesome.com/ff0d0c2aec.js"
    crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/styles/order.css">

 
</head>
<body>
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

    <div class="container mt-4">
        <h2 class="mb-3">Orders</h2>
        
        <div class="order-container mb-4">
            <table class="table table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Order Date</th>
                        <th>Name</th>
                        <th>Room</th>
                        <th>Ext</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2025-02-01 10:30 AM</td>
                        <td>Ahmed Ibrahim</td>
                        <td>14</td>
                        <td>6</td>
                        <td><span class="badge bg-warning">Processing</span></td>
                    </tr>
                </tbody>
            </table>
            
            <div class="d-flex justify-content-around flex-wrap gap-3">
                <div class="product-card">
                    <img src="/Images/juice.jpeg" alt="" width="80">
                    <div class="price-badge">8 LE</div>
                    <p>juice</p>
                </div>
                <div class="product-card">
                    <img src="/Images/hot-chocolate.jpg" alt="" width="80">
                    <div class="price-badge">6 LE</div>
                    <p>Coffee</p>
                </div>
                <div class="product-card">
                    <img src="/Images/juice.jpeg" alt="" width="80">
                    <div class="price-badge">8 LE</div>
                    <p>juice</p>
                </div>
                <div class="product-card">
                    <img src="/Images/OIP.jpeg" alt="" width="80">
                    <div class="price-badge">10 LE</div>
                    <p>tea</p>
                </div>
            </div>
            <div class="text-end mt-3">
                <h5><strong>Total: 37 LE</strong></h5>
            </div>
        </div>
        

        <div class="order-container">
            <table class="table table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Order Date</th>
                        <th>Name</th>
                        <th>Room</th>
                        <th>Ext</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2025-02-02 11:00 AM</td>
                        <td>Omar Ahmed</td>
                        <td>10</td>
                        <td>8</td>
<td><span class="badge bg-success">Delivered</span></td>
                    </tr>
                </tbody>
            </table>
            
            <div class="d-flex justify-content-around flex-wrap gap-3">
                <div class="product-card">
                    <img src="/Images/OIP.jpeg" alt="" width="80">
                    <div class="price-badge">5 LE</div>
                    <p>Tea</p>
                </div>
                <div class="product-card">
                    <img src="/Images/juice.jpeg" alt="" width="80">
                    <div class="price-badge">8 LE</div>
                    <p>juice</p>
                </div>
                <div class="product-card">
                    <img src="/Images/hot-chocolate.jpg" alt="" width="80">
                    <div class="price-badge">8 LE</div>
                    <p>Nescafe</p>
                </div>
                <div class="product-card">
                    <img src="/Images/hot-chocolate.jpg" alt="" width="80">
                    <div class="price-badge">10 LE</div>
                    <p>hot-chocolate</p>
                </div>
            </div>
            <div class="text-end mt-3">
                <h5><strong>Total: 34 LE</strong></h5>
            </div>
        </div>
    </div>
</body>
</html>