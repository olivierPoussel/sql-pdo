<?php

require_once('./vendor/autoload.php');

use App\Entity\Acteur;
use App\Repository\ActeurRepository;

//algo Acteur
$repoActeur = new ActeurRepository();

//select
$listActeur = $repoActeur->getAllActeur();

foreach ($listActeur as $acteur) {
    print_r($acteur);
}

//insert
$newActeur = new Acteur(null, 'Poussel', 'Olivier');
$newActeur = $repoActeur->createActeur($newActeur);

echo 'Insert : '.(($newActeur)? 'oui': 'non').'. Id : '.$newActeur->getId().PHP_EOL;

//update
$newActeur
    ->setNom('Pitt')
    ->setPrenom('Brad')
;
$newActeur = $repoActeur->updateActeur($newActeur);
echo 'Update : '.(($newActeur)? 'oui': 'non').PHP_EOL;

// //delete
$result = $repoActeur->deleteActeur($newActeur);
echo 'Delete : '.(($result)? 'oui': 'non').PHP_EOL;