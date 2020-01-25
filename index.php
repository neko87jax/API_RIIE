<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Nonton Anime Streaming</title>
</head>
</style>
<body class='jumbotron'>
<h1 class="text-center">Nonton Anime Streaming</h1>
<?php
include "api.php";
if(isset($_GET['id'])){

    $id = $_GET['id'];
    $link =  $dataApi[$id]['link'];
    // grabbing html getLink
    $ambilMovie = grabbing($link."?mirror=2");
    
    // // mengambil Embed dari link steaming
    $linkMovie = explode('<div id="lightsVideo">',$ambilMovie);
    $closelinkMovie = explode('<ul id="tabmenu" >',$linkMovie[1]);
    ?>
  <div class="container">
<?= $closelinkMovie[0]; ?>
  </div>
    <?php
}

?>
<div class="container">

<div class="row">
    
        <?php
    foreach($dataApi as $key => $value):?>
     <div class="col-lg-3 col-sm-12 col-md-6 my-2">
        <div class="card" style="width: 15rem;">
        <img src="<?=$dataApi[$key]["image"]  ?>" class="card-img-top" alt="<?= $dataApi[$key]["judul"] ?>">
            <div class="card-body">
                <h5 class="card-title"><?= $dataApi[$key]["judul"] ?></h5>                  
                <a class="btn btn-primary" href="?id=<?=$key ?>">Nonton</a>
</button>
            </div>
    </div> 
</div>
    <?php endforeach ?>
    
</div>
</div>
</body>
</html>