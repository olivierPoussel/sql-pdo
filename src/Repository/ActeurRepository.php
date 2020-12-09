<?php

namespace App\Repository;

use App\Entity\Acteur;
use App\Provider\DataProvider;
use PDO;

class ActeurRepository
{
    /**
     * @var PDO
     */
    private $db;

    public function __construct()
    {
        $this->db = DataProvider::getConnexion();
    }

    /**
     * Retourne la liste tout les acteurs
     * 
     * @return array[Acteur]
     */
    public function getAllActeur()
    {
        $sql = 'SELECT * FROM acteur';

        $stmt = $this->db->query($sql);

        $acteurs = [];
        foreach ($stmt as $acteurBdd) {
            $acteur = new Acteur();
            $acteur->setId($acteurBdd->id);
            $acteur->setNom($acteurBdd->nom);
            $acteur->setPrenom($acteurBdd->prenom);
            $acteurs[] = $acteur;
        }

        return $acteurs;
    }

    /**
     * Undocumented function
     *
     * @param Acteur $acteur
     * 
     * @return Acteur|null
     */
    public function createActeur (Acteur $acteur) : ?Acteur
    {
        $stmt = $this->db->prepare('INSERT INTO acteur(nom, prenom) VALUE(:nom, :prenom)');
        $stmt->bindValue(':nom', $acteur->getNom());
        $stmt->bindValue(':prenom', $acteur->getPrenom());
        $result = $stmt->execute();
        
        if($result === false) {
            return null;
        }

        $acteur->setId($this->db->lastInsertId());
        
        return $acteur;
    }

    /**
     * updateActeur
     *
     * @param Acteur $acteur
     * 
     * @return Acteur|null
     */
    public function updateActeur(Acteur $acteur) : ?Acteur
    {
        $stmt = $this->db->prepare('UPDATE acteur SET nom = :nom, prenom = :prenom where id= :id');
        $stmt->bindValue(':nom', $acteur->getNom());
        $stmt->bindValue(':prenom', $acteur->getPrenom());
        $stmt->bindValue(':id', $acteur->getId());
        $result = $stmt->execute();
        
        if($result === false) {
            return null;
        }

        return $acteur;
    }

    public function deleteActeur(Acteur $acteur) : bool
    {
        $stmt = $this->db->prepare('DELETE FROM acteur where id= :id');
        $stmt->bindValue(':id', $acteur->getId());

        return $stmt->execute();
    }

}
