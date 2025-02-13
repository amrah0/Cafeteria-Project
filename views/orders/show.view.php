<!--Screen 4-->
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
    <link rel="stylesheet" href="../../styles/userorders.css" />
    <script
      src="https://kit.fontawesome.com/ff0d0c2aec.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <div class="container">
      <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">

          <div class="d-flex">
            <a href="" class="btn btn-outline-success me-2"
              ><i class="fa-solid fa-house"></i> Home</a
            >
            <a href="" class="btn btn-outline-success me-2 active"
              ><i class="fa-solid fa-cart-shopping"></i> My Orders</a
            >
          </div>

          <div class="dropdown ms-auto">
            <a
              href=""
              class="btn btn-secondary dropdown-toggle"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              <i class="fa-solid fa-user"></i> username
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="#">Change Password</a></li>
              <li><a class="dropdown-item" href="#">LogOut</a></li>
            </ul>
          </div>
        </div>
      </nav>

      <div class="row m-2">
        <div class="col-12">
          <h1 class="text-body-primary">My Orders</h1>
        </div>
      </div>

      <form
        name="dateSearch"
        action=""
        method="get"
        onsubmit="return validateDate()"
        class="row m-2"
      >
        <div class="col-md-3">
          <label for="from">From</label>
          <input
            type="date"
            class="form-control"
            min="2025-01-01"
            max="2025-12-31"
            name="from"
          />
        </div>
        <div class="col-md-3">
          <label for="to">To</label>
          <input
            type="date"
            class="form-control"
            min="2025-01-01"
            max="2025-12-31"
            name="to"
          />
        </div>
        <div class="col-md-2 align-self-end">
          <input class="btn btn-primary" type="submit" value="Filter" />
        </div>
      </form>

      <div class="row m-2">
        <div class="col-12 table-responsive">
          <table class="table table-striped table-hover table-bordered">
            <thead>
              <tr class="table-dark">
                <th>Order Date</th>
                <th>Show</th>
                <th>Status</th>
                <th>Amount</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr id="cancel">
                <td>2025/02/02 10:30 AM</td>
                <td>
                  <button onclick="displayElement()" class="btn btn-primary">
                    Show
                  </button>
                </td>
                <td>Processing</td>
                <td>55 EGP</td>
                <td>
                  <button onclick="cancel()" class="btn btn-primary">
                    Cancel
                  </button>
                </td>
              </tr>
              <tr>
                <td>2025/02/02 10:30 AM</td>
                <td><a href="" class="btn btn-primary">Show</a></td>
                <td>Out For Delivery</td>
                <td>20 EGP</td>
                <td></td>
              </tr>
              <tr>
                <td>2025/02/02 10:30 AM</td>
                <td><a href="" class="btn btn-primary">Show</a></td>
                <td>Done</td>
                <td>29 EGP</td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="row m-2" id="Element" style="display: none">
        <div class="col-md-3 mb-3">
          <div class="card">
            <img
              class="card-img-top"
              src="../../Images/tea.avif"
              alt="Card image cap"
            />
            <div
              class="card-body text-center d-flex flex-column justify-content-center align-items-center"
            >
              <h5 class="card-title">Tea</h5>
              <h5 class="card-title">10 LE</h5>
              <h5 class="card-title">1</h5>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <div class="card">
            <img
              class="card-img-top"
              src="../../Images/tea.avif"
              alt="Card image cap"
            />
            <div
              class="card-body text-center d-flex flex-column justify-content-center align-items-center"
            >
              <h5 class="card-title">Tea</h5>
              <h5 class="card-title">10 LE</h5>
              <h5 class="card-title">1</h5>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <div class="card">
            <img
              class="card-img-top"
              src="../../Images/tea.avif"
              alt="Card image cap"
            />
            <div
              class="card-body text-center d-flex flex-column justify-content-center align-items-center"
            >
              <h5 class="card-title">Tea</h5>
              <h5 class="card-title">10 LE</h5>
              <h5 class="card-title">1</h5>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <div class="card">
            <img
              class="card-img-top"
              src="../../Images/tea.avif"
              alt="Card image cap"
            />
            <div
              class="card-body text-center d-flex flex-column justify-content-center align-items-center"
            >
              <h5 class="card-title">Tea</h5>
              <h5 class="card-title">10 LE</h5>
              <h5 class="card-title">1</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 text-end">
          <h4>Total</h4>
          <h4>104 EGP</h4>
        </div>
      </div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>

    <script src="../../scripts/userorders.js"></script>
  </body>
</html>
