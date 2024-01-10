<?php
require_once "../app/config/config.php";
require_once "../app/classes/Admin.php";
require_once "../app/classes/Post.php";
require_once "../app/classes/Place.php";
$admin = new Admin();
if($admin->is_logged()){
    $place = new Place();

    $places = $place->fetch_all();
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $post = new Post();

        $userid = $_POST['userid'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $first_image = $_POST['photo_path_one'];
        $second_image = $_POST['photo_path_two'];
        $third_image = $_POST['photo_path_three'];
        $curr_place = $_POST['place'];
        $created = $post->create($userid,$title,$description,$curr_place,$first_image,$second_image,$third_image);
        if($created){
            $_SESSION['message']['type'] = "danger";
            $_SESSION['message']['text'] = "Error while creating product!";
            header('location:admin.php');
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
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add post page</title>
</head>
<body class="bg-dark text-light">
<div class="row justify-content-center">
    <div class="col-lg-5">
        <h3 class="text-center py-5">Add post</h3>
        <form action="" method="post">
            <div class="form-group mb-3 ">
                <label for="userid">Enter user id</label>
                <input type="text" name="userid" id="userid" class="form-control bg-dark text-light">
            </div>
            <div class="form-group mb-3">
                <label for="title">Enter tittle</label>
                <input type="text" name="title" id="title" class="form-control bg-dark text-light">
            </div>
            <div class="form-group mb-3">
                <label for="place">Enter place</label>
                <select name="place" id="" class="form-control bg-dark text-light">
                    <option value="" disabled selected>Select place</option>
                    <?php
                    foreach ($places as $splace){
                        echo "<option value='".$splace['place_id']."'>".$splace['name']."</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="description">Enter description</label>
                <input type="text" name="description" id="description" class="form-control bg-dark text-light">
            </div>
            <div class="form-group mb-3">
                <label for="pictures">Upload pictures</label>
                <input type="hidden" name="photo_path_one" id="photoPathInputOne">
                <div class="dropzone bg-dark text-light " id="dropzone-upload-one"></div>
            </div>
            <div class="form-group mb-3">
                <input type="hidden" name="photo_path_two" id="photoPathInputTwo">
                <div class="dropzone bg-dark text-light" id="dropzone-upload-two"></div>
            </div>
            <div class="form-group mb-3">
                <input type="hidden" name="photo_path_three" id="photoPathInputThree">
                <div class="dropzone bg-dark text-light" id="dropzone-upload-three"></div>
            </div>
            <button type="submit" class="btn btn-primary">Save post</button>
        </form>
    </div>
</div>
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script>
    const dropzoneOne = new Dropzone("#dropzone-upload-one", {
        url: "upload_photo_one.php",
        paramName: "photo_one",
        maxFilesize: 20,
        acceptedFiles: "image/*",
        init: function(){
            this.on("success", function(file, response){
                const jsonResponse = JSON.parse(response);
                if(jsonResponse.success){
                    document.getElementById('photoPathInputOne').value = jsonResponse.photo_path_one;
                } else {
                    console.error(jsonResponse.error);
                }
            });
        }
    });

    // Second Dropzone instance
    const dropzoneTwo = new Dropzone("#dropzone-upload-two", {
        url: "upload_photo_two.php",
        paramName: "photo_two",
        maxFilesize: 20,
        acceptedFiles: "image/*",
        init: function(){
            this.on("success", function(file, response){
                const jsonResponse = JSON.parse(response);
                if(jsonResponse.success){
                    document.getElementById('photoPathInputTwo').value = jsonResponse.photo_path_two;
                } else {
                    console.error(jsonResponse.error);
                }
            });
        }
    });

    // Third Dropzone instance
    const dropzoneThree = new Dropzone("#dropzone-upload-three", {
        url: "upload_photo_three.php",
        paramName: "photo_three",
        maxFilesize: 20,
        acceptedFiles: "image/*",
        init: function(){
            this.on("success", function(file, response){
                const jsonResponse = JSON.parse(response);
                if(jsonResponse.success){
                    document.getElementById('photoPathInputThree').value = jsonResponse.photo_path_three;
                } else {
                    console.error(jsonResponse.error);
                }
            });
        }
    });
</script>
</body>
</html>
