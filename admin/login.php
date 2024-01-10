<?php
    require_once "../app/config/config.php";
    require_once "../app/classes/Admin.php";
    $admin = new Admin();
    if($admin->is_logged()){
        header('location: admin.php');
    }
    if($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $created = $admin->login($username,$password);

    if($created){
        $_SESSION['message']['type'] = "success";
        $_SESSION['message']['text'] = "Successfully logged.";
        header('location:admin.php');
        exit;
    }
    else{
        $_SESSION['message']['type'] = "danger";
        $_SESSION['message']['text'] = "Error.";
        header('location:login.php');
        exit;
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin login</title>
</head>
<body class="bg-dark text-light">
<div class="row justify-content-center">
    <div class="col-lg-5">
        <h3 class="text-center py-5">Login</h3>
        <form action="" method="post">
            <div class="form-group mb-3">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</div>
</body>
</html>