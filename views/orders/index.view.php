<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/styles/order.css">

 
</head>
<body>
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