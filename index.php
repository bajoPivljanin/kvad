<?php
require_once "app/config/config.php";
require_once "app/classes/Place.php";
require_once "app/classes/Post.php";

$place = new Place();

$places = $place->fetch_all();
$top_places = $place->select_two_best();
$other_places = $place->select_other();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@700,400,500,600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9310e1148a.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/scss/style.css">
    <title>kvadovi.rs</title>
</head>
<body>

<?php
    require_once "inc/header.php"
?>
<div class="hero-section">
    <h1>IZNAJMI, OSVAJAJ, UŽIVAJ</h1>
    <p>Iznajmljivanje kvadova za nezaboravnu vožnju</p>
    <div class="mesto">
        <form action="" method="post">
            <select name="place" id="" class="custom-select">
                <option value="" disabled selected>Navedite mesto</option>
                <?php
                foreach ($places as $splace){
                    echo "<option value='".$splace['place_id']."'>".$splace['name']."</option>";
                }
                ?>
            </select>
        </form>
        <button>Pretrazi kvadove</button>
        <!-- <input type="submit" value="submit" id="submitday"> -->
    </div>
</div>

<div class="ponude-section">
    <div class="container">
        <h1>Popularne ponude</h1>
        <p>Izdvajanje najboljih ili najnovijih ponuda</p>
        <div class="row">
            <?php foreach ($top_places as $top):?>
                <div class="col-md-6">
                    <div class="ponuda1">
                        <h1><?=$top['name']?></h1>
                        <p>info</p>
                        <img src="public/img/serbia.png" alt="">
                    </div>
                </div>
            <?php endforeach;?>
        </div>
        <div class="row">
            <?php foreach ($other_places as $other):?>
                <div class="col-md-4">
                    <div class="ponuda3">
                        <h1><?=$other['name']?></h1>
                        <p>info</p>
                        <img src="public/img/serbia.png" alt="">
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</div>

<div class="mark-section">
    <h1>Zašto izabrati nas</h1>
    <p>Otkrijte prednosti korišćenja našeg oglasnog portala za iznajmljivanje kvadova</p>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <i class="fa-solid fa-bullhorn"></i>
                <h1>Širok izbor oglasa</h1>
                <p>Naš portal okuplja raznovrsne oglase za iznajmljivanje kvadova širom Srbije. Bez obzira na lokaciju ili specifične zahteve</p>
            </div>
            <div class="col-md-4">
                <i class="fa-solid fa-magnifying-glass"></i>
                <h1>Efikasna pretraga</h1>
                <p>Naša platforma vam omogućava jednostavno pronalaženje idealnog kvada. Samo unesite lokaciju iznajmljivanja, i brzo ćete pronaći najbolje ponude.</p>
            </div>
            <div class="col-md-4">
                <i class="fa-solid fa-shield-halved"></i>
                <h1>Pouzdanost</h1>
                <p>Naša platforma je pouzdana, pružajući vam jednostavan pristup željenim informacijama. Sve to doprinosi sigurnosti i jednostavnosti korisničkog iskustva.</p>
            </div>
        </div>
    </div>
</div>

<!-- <div class="mapa-section">
    <h1><i class="fa-solid fa-location-dot"></i>Otkrijte lokacije za iznajmljivanje kvadova na mapi</h1>
    <div class="mapa">
        <img src="/img/mapa.png" alt="">
        <i class="fa-solid fa-location-dot" id="pin1" class="pin"></i>
        <i class="fa-solid fa-location-dot" id="pin2" class="pin"></i>
        <i class="fa-solid fa-location-dot" id="pin3" class="pin"></i>
    </div>
</div> -->
<?php
    require_once "inc/footer.php";
?>
<script src="public/js/script.js"></script>
</body>
</html>
