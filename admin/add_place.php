<?php
require_once "../app/config/config.php";
require_once "../app/classes/Admin.php";
require_once "../app/classes/Place.php";
$admin = new Admin();
if($admin->is_logged()){
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $place = new Place();

        $name = $_POST['name'];
        $district = $_POST['district'];

        $created = $place->create($name,$district);
        if($created){
            $_SESSION['message']['type'] = "danger";
            $_SESSION['message']['text'] = "Error while creating product!";
            header('location:add_place.php');
            exit;
        }
        else{
            $_SESSION['message']['type'] = "success";
            $_SESSION['message']['text'] = "Successfully created product!";
            header('location:admin.php');
            exit;
        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add place</title>
</head>
<body class="bg-dark text-light">
<div class="row justify-content-center">
    <div class="col-lg-5">
        <h3 class="text-center py-5">Add new place</h3>
        <form action="" method="post">
            <div class="form-group mb-3">
                <label for="name">Enter name of place</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="district">Enter district</label>
                <input type="text" name="district" id="district" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Save post</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>