<?php
abstract class Animal
{
// Déclaration des attributs

private $couleur = "gris";
private $poids = 10;
//constantes de classe
const POIDS_LEGER = 5;
const POIDS_MOYEN = 10;
const POIDS_LOURD = 15;
// Déclaration de la variable statique $compteur
private static $compteur = 0;
public function __construct($couleur, $poids) // Constructeur demandant 2 paramètres.

{
echo 'Appel du constructeur.<br />';
$this->couleur = $couleur; // Initialisation de la couleur.
$this->poids = $poids; // Initialisation du poids.
self::$compteur = self::$compteur + 1;
}
//accesseurs
public function getCouleur()

{
return $this->couleur; //retourne la couleur
}

public function setCouleur($couleur)

{

$this->couleur = $couleur; //écrit dans l'attribut couleur

}
public function getPoids()
{

return $this->poids; //retourne la poids

}

public function setPoids($poids)

{

$this->poids = $poids; //écrit dans l'attribut poids

}
//méthodes publiques

public function manger_animal(Animal $animal_mangé)
{

//l'animal mangeant augmente son poids d'autant que
// celui de l'animal mangé
$this->poids = $this->poids + $animal_mangé->poids;
//le poids de l'animal mangé et sa couleur son remis à 0
$animal_mangé->poids = 0;
$animal_mangé->couleur = "";

}
public static function se_deplacer()
{

echo "L'animal se déplace."; }

public function ajouter_un_kilo()
{

$this->poids = $this->poids + 1; }

// Méthode statique retournant la valeur du compteur

public static function getCompteur()
{
return self::$compteur;
}

//code non implémenté car méthode abstraite

abstract public function respire();

}
?>