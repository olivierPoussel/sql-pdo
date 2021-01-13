<?php

namespace App\Entity;

class Film
{
    /** @var int */
    private $id;
    /** @var string */
    private $titre;
    /** @var int */
    private $duree;
    /** @var Acteur[] */
    private $acteurs;

    public function __construct() {
        $this->acteurs = [];
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of titre
     */ 
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */ 
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of duree
     */ 
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set the value of duree
     *
     * @return  self
     */ 
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get the value of acteurs
     */ 
    public function getActeurs()
    {
        return $this->acteurs;
    }

    /**
     * Set the value of acteurs
     *
     * @return  self
     */ 
    public function addActeur(Acteur $acteur)
    {
        $this->acteurs[] = $acteur;

        return $this;
    }
}
