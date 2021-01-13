<?php

namespace App\Repository;

use App\Entity\Acteur;
use App\Entity\Film;
use App\Provider\DataProvider;
use PDO;

class FilmRepository
{
    /** @var PDO */
    private $connexion;

    public function __construct() {
        $this->connexion = DataProvider::getConnexion();
    }

    public function getFilmWithActeur(Film $film)
    {
        $sql = 'SELECT * FROM film 
                INNER JOIN joue on joue.film_id = film.id 
                INNER JOIN acteur on joue.acteur_id = acteur.id
                where film.id = :id';
        $prepareStatement = $this->connexion->prepare($sql);
        $prepareStatement->bindValue(':id', $film->getId());
        $prepareStatement->execute();

        $result = $prepareStatement->fetchAll();

        foreach ($result as $row) {
            $acteur = new Acteur();
            $acteur
                ->setIdActeur($row->acteur_id) //$rom['acteur_id']
                ->setNom($row->nom)
                ->setPrenom($row->prenom)
            ;
            $film->addActeur($acteur);
        }

        return $film;
    }
}
