<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">


        <div class="d-flex">
            <a href="/admin/catalog" class="btn btn-outline-success me-2"><i class="fa-solid fa-house"></i> Home</a>
            <a href="/admin/products" class="btn btn-outline-success me-2  "><i class="fa-solid fa-store "></i> Products</a>
            <a href="/admin/users" class="btn btn-outline-success me-2 "><i class="fa-solid fa-user"></i> Users</a>
            <a href="/admin/orders" class="btn btn-outline-success me-2"><i class="fa-solid fa-cart-shopping"></i> Manual Order</a>
            <a href="/admin/checks" class="btn btn-outline-success"> <i class="fa-solid fa-money-check-dollar"></i> Checks</a>

        </div>

        <div class="dropdown ms-auto">
            <a
                href=""
                class="btn btn-secondary dropdown-toggle"
                data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="fa-solid fa-user-tie"></i>
                <?php
                echo $_SESSION['user_role'];
                ?>

            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#"> <?php echo $_SESSION['email'] ?></a></li>
                <li><a class="dropdown-item" href="/logout">LogOut</a></li>
            </ul>
        </div>
    </div>
</nav>
