<?php

$em = require __DIR__.'/bootstrap.php';

use BenjaminGuillemant\PokemonBattle\PokemonModel;

$pokemonFire = new PokemonModel();
$pokemonFire
    ->setName('Salameche')
    ->setHP(100)
    ->setType(0)
;

$em->persist($pokemonFire);

$em->flush();
