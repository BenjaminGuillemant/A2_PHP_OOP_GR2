<?php
/*
Test Création Pokemon
*/
/** @var \Doctrine\ORM\EntityManager $em */
$em = require __DIR__ . '/bootstrap.php';

use BenjaminGuillemant\PokemonBattle\Pokemon;

/** @var \Doctrine\ORM\EntityRepository $trainerRepo */
$trainerRepo = $em->getRepository('BenjaminGuillemant\PokemonBattle\Trainer');

/** @var \BenjaminGuillemant\PokemonBattle\Trainer $trainer */
$trainer = $trainerRepo->find(1);

/** @var Pokemon $pokemon */
$pokemon = new Pokemon();

$pokemon
    ->setName('Pokemon')
    ->setHP(100)
    ->setTrainer($trainer)
    ->setType(Pokemon::TYPE_FIRE)
;

// I register the pokemon
$em->persist($pokemon);

// Add it to the database
$em->flush();
