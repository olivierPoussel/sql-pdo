<?php

namespace App\Entity;

class Acteur extends Humain
{
    /** @var int */
    private $idActeur;

    /**
     * Get the value of idActeur
     */ 
    public function getIdActeur()
    {
        return $this->idActeur;
    }

    /**
     * Set the value of idActeur
     *
     * @return  self
     */ 
    public function setIdActeur($idActeur)
    {
        $this->idActeur = $idActeur;

        return $this;
    }
}
