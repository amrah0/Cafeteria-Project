<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Orders</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="/css/style.css" />
    <script
      src="https://kit.fontawesome.com/ff0d0c2aec.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <div class="container">
      <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
          <!-- Left-aligned buttons -->
          <div class="d-flex">
            <a href="" class="btn btn-outline-success me-2"><i class="fa-solid fa-house"></i> Home</a>
            <a href="" class="btn btn-outline-success me-2 "></i><i class="fa-solid fa-store"></i> Products</a>
            <a href="" class="btn btn-outline-success me-2 active"><i class="fa-solid fa-user"></i> Users</a>
            <a href="" class="btn btn-outline-success me-2"><i class="fa-solid fa-cart-shopping"></i> Manual Order</a>
            <a href="" class="btn btn-outline-success me-2"><i class="fa-solid fa-money-check-dollar"></i> Checks</a>
          </div>

          <!-- Right-aligned dropdown -->
          <div class="dropdown ms-auto ">
            <a
              href=""
              class="btn btn-secondary dropdown-toggle"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
            <i class="fa-solid fa-user-tie"></i>Admin
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="#">Change Password</a></li>
              <li><a class="dropdown-item" href="#">LogOut</a></li>
            </ul>
          </div>
        </div>
      </nav>

      <div class="row m-2">
        <div class="col">
          <h1 class="text-body-primary">All Users</h1>
      
        </div>
        <div class="col text-end">
          <a href="">Add User</a>
        </div>
      </div>

     
       
      </form>

      <div class="row m-2">
        <div class="col-12 table-responsive">
          <table class="table table-striped table-hover table-bordered text-center">
            <thead>
              <tr class="table-dark">
                <th>Name</th>
                <th>Room</th>
                <th>Image</th>
                <th>Ext</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr >
                <td>Amr</td>
                <td>
                 109
                </td>
                <td><img src="" alt=""></td>
                <td>555</td>
                <td>
                  
                  <a href="" class="btn btn-primary">Edit</a>
                  <button  class="btn btn-primary">
                    delete
                  </button>
                </td>
              </tr>
              <tr >
                <td>Mohamed</td>
                <td>
                 110
                </td>
                <td><img src="" alt=""></td>
                <td>555</td>
                <td>
                  
                  <a href="" class="btn btn-primary">Edit</a>
                  <button  class="btn btn-primary">
                    delete
                  </button>
                </td>
              </tr> <tr >
                <td>Ahella</td>
                <td>
                 111
                </td>
                <td><img src="" alt=""></td>
                <td>555</td>
                <td>
                  
                  <a href="" class="btn btn-primary">Edit</a>
                  <button  class="btn btn-primary">
                    delete
                  </button>
                </td>
              </tr>
              <tr >
                <td>Manar</td>
                <td>
                 112
                </td>
                <td><img src="" alt=""></td>
                <td>555</td>
                <td>
                  
                  <a href="" class="btn btn-primary">Edit</a>
                  <button  class="btn btn-primary">
                    delete
                  </button>
                </td>
              </tr>
              
            </tbody>
          </table>
        </div>
      </div>

     
      
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>

    <script src="../js/script.js"></script>
  </body>
</html>
