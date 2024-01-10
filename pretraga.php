<?php
require_once "app/config/config.php";
require_once "app/classes/Place.php";
require_once "app/classes/Post.php";

$place = new Place();
$post = new Post();

$places = $place->fetch_all();
$count = $post->count_posts();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@700,400,500,600&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/9310e1148a.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="public/css/scss/style.css">
        <link rel="stylesheet" href="public/css/scss/pretraga.css">
        <title>kvadovi.rs | Pretraga</title>
    </head>
</head>
<body>
    <?php
    require_once "inc/header.php"
    ?>
    <div class="mesto">
        <div class="pretraga-text">
            <h1>Pretraga kvadova | <span> <?=$count['br_oglasa']?> oglasa</span></h1>
        </div>
        <form action="" method="post">
            <select name="place" id="" class="custom-select">
                <option value="" disabled selected>Navedite mesto</option>
                <?php
                foreach ($places as $splace){
                    echo "<option value='".$splace['place_id']."'>".$splace['name']."</option>";
                }
                ?>
            </select>
            <button>Pretrazi</button>
        </form>
        <!-- <input type="submit" value="submit" id="submitday"> -->
    </div>

    <div class="oglasi">
        <div class="oglas1">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src="public/img/kvad.jpeg" alt="">
                    </div>
                    <div class="col-md-6">
                        <h1>Kvadovi cularevac</h1>
                        <h2><i class="fa-solid fa-location-dot"></i> Beograd</h2>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="oglas1">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src="public/img/kvad.jpeg" alt="">
                    </div>
                    <div class="col-md-6">
                        <h1>Kvadovi cularevac</h1>
                        <h2><i class="fa-solid fa-location-dot"></i> Beograd</h2>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="oglas1">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src="public/img/kvad.jpeg" alt="">
                    </div>
                    <div class="col-md-6">
                        <h1>Kvadovi cularevac</h1>
                        <h2><i class="fa-solid fa-location-dot"></i> Beograd</h2>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="oglas1">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src="public/img/kvad.jpeg" alt="">
                    </div>
                    <div class="col-md-6">
                        <h1>Kvadovi cularevac</h1>
                        <h2><i class="fa-solid fa-location-dot"></i> Beograd</h2>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
require_once "inc/footer.php"
?>
<script src="public/js/script.js"></script>
</body>
</html>
