<!--Screen 1-->
<?php
// TODO: IMPLEMENT ERROR HANDLING, AND OLD DATA, AS IN INDEX.PHP
session_start();

if(isset($_SESSION['login'])){
    header('Location: homepage.php');
}

if(isset($_GET['invalid']))
{
    $invalid = json_decode($_GET['invalid']);
}

if(isset($_GET['email']))
{
    $old_email = $_GET['email'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Login</title>
</head>
<body>
<main class="container-lg col-4">
    <h3 class="mt-2 text-center">Log In <a href="index.php" class="btn btn-dark">Sign Up</a></h3>
    <hr>
    <form action="loginController.php" method="POST">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" value="<?php echo $old_email ?? '' ?>" name="email" class="form-control" id="email" aria-describedby="emailHelp">
            <p class="text-danger"><?php echo $invalid ?? '' ?></p>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" value="<?php echo $old_password ?? '' ?>" class="form-control" id="password" aria-describedby="emailHelp">
            <p class="text-danger"><?php echo $password ?? '' ?></p>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-primary">Reset</button>
    </form>

</main>
</body>
</html>