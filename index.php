<?php

declare(strict_types=1);

ini_set('display_errors', '1');

ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

echo "<h2>Welcome to the pokedex</h2>";

//placeholding a pokemon for the moment to test


$pokemon = $_POST['input'];

if ($pokemon === null) {
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

/*
$evoData = file_get_contents($pokemonQuery['evolution_chain']['url'], true);
$evoQuery = json_decode($evoData, true);

$previousForm = $evoQuery['evolves_from_species']['name'];
$PreviousData = file_get_contents('https://pokeapi.co/api/v2/pokemon/' . $previousForm);
$previousQuery = json_decode($PreviousData, true);
*/
/*
if ($evoQuery['evolves_from_species'] === null) {
    echo 'no previous evolution';
} else {


}
*/
echo "<strong>$idNum</strong>";
echo " ";
echo "<strong>$pokeName</strong>";
echo "<br>";
echo "<br>";

$i = 0;
for ($i = 0; $i < 4; $i++) {
    echo $moves[] = $movesList[$i]['move']['name'] . "<br />";


}
echo "<br>";


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pokédex</title>
</head>
<body>


<form action="index.php" method="post">
    <input type="text" name="input" placeholder="Enter pokemon name or id"/>
    <input type="submit"/>
</form>
<img src="<?php echo $pokemonQuery['sprites']['front_default'] ?>"

</body>
</html>

