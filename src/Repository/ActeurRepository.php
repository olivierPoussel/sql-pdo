<?php

namespace App\Repository;

use App\Entity\Acteur;
use App\Provider\DataProvider;
use PDO;
use PDOException;

class ActeurRepository 
{
    private $connexion;

    public function __construct() {
        $this->connexion = DataProvider::getConnexion();
    }

    /**
     * Création d'un acteur
     *
     * @param Acteur $acteur
     * 
     * @return Acteur
     */
    public function createActeur(Acteur $acteur)
    {
        $sql = 'INSERT INTO acteur(nom, prenom) VALUE(:nom, :prenom)';
        $prepareStatement = $this->connexion->prepare($sql);
        $prepareStatement->bindValue(':nom', $acteur->getNom());
        $prepareStatement->bindValue(':prenom', $acteur->getPrenom());
        $result = $prepareStatement->execute();

        if($result === false) {
            throw new PDOException("Erreur lors de la création de l'acteur", 1);
        }

        $acteur->setIdActeur($this->connexion->lastInsertId());

        return $acteur;
    }
    
    /**
     * Maj d'un acteur
     *
     * @param Acteur $acteur
     * 
     * @return Acteur
     */
    public function udateActeur(Acteur $acteur)
    {
        $sql = 'UPDATE acteur SET nom = :nom, prenom = :prenom WHERE id = :id';
        $prepareStatement = $this->connexion->prepare($sql);
        $prepareStatement->bindValue(':nom', $acteur->getNom());
        $prepareStatement->bindValue(':prenom', $acteur->getPrenom());
        $prepareStatement->bindValue(':id', $acteur->getIdActeur());
        $result = $prepareStatement->execute();

        if($result === false) {
            throw new PDOException("Erreur lors de la maj de l'acteur", 1);
        }

        return $acteur;
    }
    
    /**
     * Suppresion d'un acteur
     *
     * @param Acteur $acteur
     * 
     * @return Acteur
     */
    public function deleteActeur(Acteur $acteur)
    {
        $sql = 'DELETE FROM acteur WHERE id = :id';
        $prepareStatement = $this->connexion->prepare($sql);
        $prepareStatement->bindValue(':id', $acteur->getIdActeur());
        $result = $prepareStatement->execute();

        if($result === false) {
            throw new PDOException("Erreur lors de la suppression de l'acteur", 1);
        }

        return $acteur;
    }

    /**
     * récupérer tous les acteurs de la table acteur
     *
     * @return Acteur[]
     */
    public function readActeur()
    {
        $sql = 'SELECT * FROM acteur';
        $stmt = $this->connexion->query($sql, PDO::FETCH_CLASS, Acteur::class);

        // var_dump($stmt);

        $all = $stmt->fetchAll();
        // var_dump($all);

        return $all;
    }

}