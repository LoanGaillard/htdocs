<?php
class Voiture extends Quatre_roue
{

    private $couleur = "gris";
    private $pneu = 10;
    // Déclaration de la variable statique $compteur
    private static $compteur = 0;
    public function __construct($couleur, $pneu) // Constructeur demandant 2 paramètres

private $nombre_pneu_neige; //type du vehicule
//accesseurs
public function getType()
{
if ($this->nombre_pneu_neige) {

return "nombre pneu neige"; //retourne le type

}
else if ($this->nombre_pneu_neige === false) {

return "ne Roule pas sur terre"; //retourne le type

}
else {

return "";

}

}
public function setType($nombre_pneu_neige)
{

$this->nombre_pneu_neige = $nombre_pneu_neige; //écrit dans l'attribut nombre_pneu_neige

}
//méthode
public function ajouter_un_pneu()
{

$this->pneu = $this->pneu + 1; }

// Méthode statique retournant la valeur du compteur

public static function getCompteur()
{
return self::$compteur;
}
}
}
?>