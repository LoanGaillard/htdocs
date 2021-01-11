<?php
class Camion extends Quatre_roue
{

    private $couleur = "gris";
    private $remorque = 10;
    // Déclaration de la variable statique $compteur
    private static $compteur = 0;
    public function __construct($couleur, $pneu) // Constructeur demandant 2 paramètres

private $longueur; //type du vehicule
//accesseurs
public function getType()
{
if ($this->longueur) {

return "longueur"; //retourne le type

}
else if ($this->longueur === false) {

return ""; //retourne le type

}
else {

return "";

}

}
public function setType($longueur)
{

$this->longueur = $longueur; //écrit dans l'attribut longueur

}
//méthode
public function ajouter_remorque()
{

$this->remorque = $this->remorque + 1; }

// Méthode statique retournant la valeur du compteur

public static function getCompteur()
{
return self::$compteur;
}
}
}
?>