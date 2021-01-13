<?php

require_once('./vendor/autoload.php');

use App\Entity\Film;
use App\Repository\ActeurRepository;
use App\Repository\FilmRepository;

$acteurRepo = new ActeurRepository();

$test = $acteurRepo->readActeur();

$filmRepo = new FilmRepository();
$film = new Film();
$film->setId(2);
$test2 = $filmRepo->getFilmWithActeur($film);
var_dump($test2);