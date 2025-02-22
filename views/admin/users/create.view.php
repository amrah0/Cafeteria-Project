<?php

if (isset($_GET['error'])){
    $errors = json_decode($_GET['error'], true);
    extract($errors);  # variable with values --> based on errors
}
if(isset($_GET['old'])){
    $old_data = json_decode($_GET['old'], true);

//var_dump($old_data);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />
    <script
    src="https://kit.fontawesome.com/ff0d0c2aec.js"
    crossorigin="anonymous"></script>


</head>
<body>
    
<div class="container">
    <?php if (isset($_GET['success'])): ?>
        <div class="alert alert-success" role="alert">
            User inserted successfully
        </div>
    <?php elseif (isset($_GET['error'])): ?>
        <p style="color: red;">
            <?php
            if ($_GET['error'] == 'missing') {
                echo "Please fill in all fields.";
            }
            ?>
        </p>
    <?php endif; ?>
    <div class="container">

        <?php require base_path('views/partials/nav.php')?>


        <h1>Add User  </h1>
    <form method="post" action="../../../controllers/admin/users/create.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input value="<?php echo $old_data['name'] ?? ''; ?>" name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Name">
            <p class="text-danger"> <?php echo $errors['name']?? "" ?> </p>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input value="<?php echo $old_data['email'] ?? ''; ?>" name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <p class="text-danger"> <?php echo $errors['email']?? "" ?> </p>

        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input  name="pass" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            <p class="text-danger"> <?php echo $errors['pass']?? "" ?> </p>

        </div><div class="form-group">
            <label for="exampleInputPassword1">Confirm Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password">
            <p class="text-danger"> <?php echo $errors['pass']?? "" ?> </p>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Role</label>
            <select  name="role" required>
                    <option value="admin">admin</option>
                    <option value="user">user</option>
            </select><br><br>
            <p class="text-danger"> <?php echo $errors['room_n']?? "" ?> </p>

        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Room No</label>
            <select  name="room_n" required>
                <?php foreach ($rooms as $room):?>
                 <option value="<?= $room['id']?>"><?=$room['name'] ?></option>
                <?php  endforeach; ?>
            </select><br><br>
            <p class="text-danger"> <?php echo $errors['room_n']?? "" ?> </p>

        </div>

        <div class="custom-file">
            <label>Profile Picture</label>
            <input name="image" type="file" class="custom-file-input" id="validatedCustomFile" >
            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
            <div class="invalid-feedback">Example invalid custom file feedback</div>
            <p class="text-danger"> <?php echo $errors['image']?? "" ?> </p>

        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="reset" class="btn btn-primary">Reset</button>
    </form>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>