<?php

$em = require __DIR__.'/bootstrap.php';

use BenjaminGuillemant\PokemonBattle\TrainerModel;


/** @var TrainerModel $new_trainer */
$new_trainer = new TrainerModel();
$new_trainer
    ->setUserName('trainer1')
    ->setPassword('1234')
    ;

$em->persist($new_trainer);

$em->flush();