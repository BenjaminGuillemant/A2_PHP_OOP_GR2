<?php

/** @var \Doctrine\ORM\EntityManager $em */
$em = require __DIR__ . '/_header_connect.php';

$error = NULL;
/** @var \Doctrine\ORM\EntityRepository $PokemonRepo */
$PokemonRepo = $em->getRepository('BenjaminGuillemant\PokemonBattle\Pokemon');

/** @var \Doctrine\ORM\EntityRepository $trainerRepo */
$trainerRepo = $em->getRepository('BenjaminGuillemant\PokemonBattle\Trainer');

try{
    /** @var \BenjaminGuillemant\PokemonBattle\Trainer $trainer */
    $trainer = $trainerRepo->find($_SESSION['trainer']);
    /** @var \BenjaminGuillemant\PokemonBattle\Pokemon $pokemon */
    $pokemon = $PokemonRepo->findOneBy([
        'trainer' => $trainer,
    ]);
    /** @var Array $pokemons */
    $pokemons = $PokemonRepo->findAll();
}
catch(Exception $e){
    $error = $e->getMessage();
}


catch(Exception $e){
    $error = $e->getMessage();
}
if(!isset($pokemon) || NULL === $pokemon){
    header('Location:dashboard.php');
}
else{
    $lastFight = $pokemon->getLastfight();
    if($lastFight < time()-6*3600)
        $fight = true;
}



// Display the model
echo $twig ->render('fight.html.twig',[
    'pokemons' => $pokemons,
    'error' => $error,
    'fight' => $fight,
    'trainerId' => $_SESSION['trainer'],
]);
