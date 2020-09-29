<?php

declare(strict_types=1);

ini_set('display_errors', '1');

ini_set ('display_startup_errors','1');
error_reporting(E_ALL);

echo "<h2>Welcome to the pokedex</h2>";

//placeholding pikachu rn until I find out how to get input.

$PokemonData = file_get_contents('https://pokeapi.co/api/v2/pokemon/$input');
//shows a lot of unfiltered data.
$pokemonQuery=var_dump(json_decode($PokemonData));
$input=$_GET["input"];


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pokedex</title>
</head>
<body>
<form method="post">
    <input type="text" name="input" id="input" placeholder="insert pokemon name or id"><br>

    <input type="submit">
</body>
</html>

