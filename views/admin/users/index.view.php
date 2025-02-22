<!--Screen 6-->
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

      <?php require base_path('views/partials/nav.php')?>

      <div class="row m-2">
          <div class="col">
              <h1 class="text-body-primary">All Users</h1>

          </div>
          <div class="col text-end">
              <a href="/admin/users/create">Add User</a>
          </div>
      </div>



      <div class="row m-2">
        <div class="col-12 table-responsive">
          <table class="table table-striped table-hover table-bordered text-center">
            <thead>
              <tr class="table-dark">
                <th>Name</th>
                <th>Room</th>
                <th>Image</th>
<!--                <th>Ext</th>-->
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($users as $user):?>
                <tr >
                    <td><?=$user['name']?></td>
                    <td>
                        <?=$user['room']?>
                    </td>
                    <td><img width="150px" src="../../../Images/<?=$user['image_url']?>" alt=""></td>
<!--                    <td>555</td>-->
                    <td>
                        <div class="container">
                            <div class="row row-cols-3">
                                <a href="/admin/users/edit?id=<?=$user['id']?>" class="btn btn-primary">Edit</a>
                                <form method="POST" action="/admin/users/delete">
                                    <input type="hidden" name="id" value="<?=$user['id']?>">
                                    <input type="submit" value="Delete" class="btn btn-primary">
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach?>
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
