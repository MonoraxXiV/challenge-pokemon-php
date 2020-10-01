<?php

declare(strict_types=1);

ini_set('display_errors', '1');

ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

echo "<h2 class='text-center'>Welcome to the pokédex</h2>";

//placeholding a pokemon for the moment to test


if (isset($_POST['input'])) {
    $pokemon = strtolower($_POST['input']);
}
else{
    $pokemon = 1;
}
//$pokemonLow = strtolower($pokemon);

$PokemonData = file_get_contents('https://pokeapi.co/api/v2/pokemon/' . $pokemon);

$pokemonQuery = json_decode($PokemonData, true);
//shows a lot of unfiltered data.

//echo only accepts strings
$idNum = $pokemonQuery['id'];
$pokeName = $pokemonQuery['name'];

$movesList = $pokemonQuery['moves'];


$evoData = file_get_contents($pokemonQuery['species']['url'], true);
$evoQuery = json_decode($evoData, true);
/*
$evoChain = file_get_contents($evoData['evolution_chain']['url'], true);
$evolutionInfo= json_decode($evoChain, true);
$evoName= $evoChain['evolves_to'][0]['evolves_to'][0]['name'];
*/
if (isset ($evoName)){
    echo $evoName;
}

if (isset ($evoQuery['evolves_from_species'])) {


    $previousForm = $evoQuery['evolves_from_species']['name'];
    $PreviousData = file_get_contents('https://pokeapi.co/api/v2/pokemon/' . $previousForm);
    $previousQuery = json_decode($PreviousData, true);

//things to figure out:
// finding where the types are stored ->done
//next evo path

    $previousSprite = $previousQuery['sprites']['front_default'];
}
$pokemonType = $pokemonQuery['types'];


echo "<br>";


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Pokédex</title>
</head>
<body>


<form action="index.php" method="post" class="text-center">
    <input type="text" name="input" placeholder="Enter pokemon name or id"/>
    <input type="submit"/>
</form>
<section class="pokemonInfo text-center">
    <?php echo "<strong>$idNum</strong>" . " " ?>
    <?php echo "<strong>$pokeName</strong>"; ?>
    <?php echo "<br>" ?>
    <?php echo "<br>" ?>
    <img src="<?php echo $pokemonQuery['sprites']['front_default'] ?>"
    <?php echo "<br>" ?>
    <?php echo "<br>" ?>
    <!--type gets added here -->
    <?php echo "type: " ?>
    <?php if (count($pokemonQuery['types']) === 1) {
        echo $pokemonType[0]['type']['name'];
    } else {
        for ($i = 0; $i < count($pokemonQuery['types']); $i++) {
            $dualType = $pokemonType[$i]['type']['name'] . " ";
            echo $dualType;
        }
    }
    ?>
    <?php echo "<br>" ?>
    <?php $i = 0;
    if (count($pokemonQuery['moves']) === 1) {
        echo $movesList[0]['move']['name'];
    } else {
        for ($i = 0; $i < 4; $i++) {
            $fourMoves = $moves[] = $movesList[$i]['move']['name'] . "<br />";
            echo $fourMoves;
        }
    } ?>
    <?php echo "<br>" ?>
    <?php if ($evoQuery['evolves_from_species'] === null) {
        $previousSprite = "";
    } else {
        echo "previous evolution" . "<br/>";
        echo "<strong>$previousQuery[id]</strong>" . " ";
        echo "<strong>$previousForm</strong>";


    }
    ?>
    <?php echo "<br>" ?>
    <?php if (isset ($previousSprite)) {
        echo '<img src="' . $previousSprite . '">';
    } ?>

</section>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
</body>
</html>

