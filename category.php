<?php

declare(strict_types=1);

ini_set('display_errors', '1');

ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

//fetch the data, trying to loop 20 times per page.
//add cards each card will have the pokemon, number, type and sprite.
//once page changes the count will change, hoping to put a switch case there.

for ($count=1; $count>=20; $count++) {

   $count++;

}
$PokemonFetch = file_get_contents('https://pokeapi.co/api/v2/pokemon/' . $count);
$pokemonJson = json_decode($PokemonFetch, true);
$idNum = $pokemonJson['id'];
$pokemonType = $pokemonJson['types'];


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List view</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<!--navbar-->

<nav class="navbar  navbar-expand-lg navbar-dark bg-dark mb-4 ">
    <a class="navbar-brand" href="#">pokédex</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Classic </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">List<span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
</nav>

<!--start of attempts to show pokemon in cards-->

<div class=" row d-flex  justify-content-center m-auto mt-25 ">
    <div class="card column col-2 mr-2">
        <img class="card-img-top" id="spriteCard" src="<?php echo $pokemonJson['sprites']['front_default'] ?>">
        <div class="card-body">
            <h4 class="card-title text-center "><?php echo $pokemonJson['id']." ".$pokemonJson['name']?></h4>
            <p class="card-text text-center">
                <?php if (count($pokemonJson['types']) === 1) {
                    echo $pokemonType[0]['type']['name'];
                } else {
                    for ($i = 0; $i < count($pokemonJson['types']); $i++) {
                        $dualType = $pokemonType[$i]['type']['name'] . " ";
                        echo $dualType;
                    }
                }
                ?>
            </p>
        </div>
    </div>
    <div class="card column col-2 mr-2">
        <img class="card-img-top" src="<?php echo $pokemonJson['sprites']['front_default'] ?>" alt="Card image cap">
        <div class="card-body">
            <h4 class="card-title"><?php $pokemonJson['id']?></h4>
            <p class="card-text">
                Some quick example text to build on the card title
                and make up the bulk of the card's content.
            </p>
        </div>
    </div>
    <div class="card column col-2 mr-2">
        <img class="card-img-top" src="/images/pathToYourImage.png" alt="Card image cap">
        <div class="card-body">
            <h4 class="card-title"><?php $pokemonJson['id']?></h4>
            <p class="card-text">
                Some quick example text to build on the card title
                and make up the bulk of the card's content.
            </p>
        </div>
    </div>
    <div class="card column col-2 mr-2">
        <img class="card-img-top" src="/images/pathToYourImage.png" alt="Card image cap">
        <div class="card-body">
            <h4 class="card-title"><?php $pokemonJson['id']?></h4>
            <p class="card-text">
                Some quick example text to build on the card title
                and make up the bulk of the card's content.
            </p>
        </div>
    </div>
    <div class="card column col-2 mr-2">
        <img class="card-img-top" src="/images/pathToYourImage.png" alt="Card image cap">
        <div class="card-body">
            <h4 class="card-title"><?php $pokemonJson['id']?></h4>
            <p class="card-text">
                Some quick example text to build on the card title
                and make up the bulk of the card's content.
            </p>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center mt-5">
<nav aria-label="Page navigation example ">
    <ul class="pagination ">
        <li class="page-item">
            <a class="page-link" href="#!" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>
        <li class="page-item"><a class="page-link" href="#!">1</a></li>
        <li class="page-item"><a class="page-link" href="#!">2</a></li>
        <li class="page-item"><a class="page-link" href="#!">3</a></li>
        <li class="page-item">
            <a class="page-link" href="#!" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul>
</nav>
</div>
</body>
</html>
