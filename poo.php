<?php

interface Deplacer {
    public function deplacer();
}

interface test extends Deplacer {
    const TEST = "TEST";
    public function test(Voiture $voiture);
}

 abstract class Vehicule
{
    protected $marque;
    protected $model;

    public function __construct($marque = "marque", $model = "model")
    {
        $this->marque = $marque;
        $this->model = $model;
    }

    public function getMarque()
    {
        return $this->marque;
    }

    abstract public function description();

    public function setMarque(string $marque)
    {
        $this->marque = $marque;
        // if(is_string($marque)) {
        // $this->marque = $marque;
        // }else {
        //     throw new Exception("la marque doit etre un string", 1);
        // }
    }
    /**
     * Get the value of model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set the value of model
     *
     * @return  self
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }
}

class Voiture extends Vehicule implements Deplacer
{
    private $nbRoue;

    public function __construct($marque = "marque", $model = "model", $nbRoue)
    {
        parent::__construct($marque, $model);
        $this->nbRoue = $nbRoue;
    }

    public function description()
    {
        // parent::description();
        echo "je suis voiture de marque {$this->marque} et de {$this->model} et j'ai {$this->nbRoue} roue(s)" . PHP_EOL;
    }

    public function deplacer()
    {
        echo "la voiture roule";
    }
}

class Velo extends Vehicule 
{
    public function description()
    {
        echo "je suis un velo de marque $this->marque et de $this->model" . PHP_EOL;
    }
}

$voiture1 = new Voiture("Audit", "Rs3", 4);
$voiture1->setMarque("Audit");
// $voiture1->setModel("Rs3");
// var_dump($voiture1);
$voiture1->description();

$voiture2 = new Voiture("Lotus", "Elise Exige", 4);
// $voiture2->setMarque("Lotus");
// $voiture2->setModel("Elise Exige");
$voiture2->description();


class Compteur {
    public static $count = 0;

    static public function plus()
    {
        self::$count++;
    }

    static public function moins()
    {
        self::$count--;
    }
}

Compteur::plus();
Compteur::plus();
Compteur::moins();

echo Compteur::$count;
