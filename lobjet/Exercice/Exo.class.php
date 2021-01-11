<?php
abstract class Vehicule
{
// Déclaration des attributs

private $couleur = "noir";
private $poids = 1500;

public function __construct ($couleur, $poids) // Constructeur demandant 2 paramètres.

{
echo 'Appel du constructeur.<br />';
$this->couleur = $couleur; // Initialisation de la couleur.
$this->poids = $poids; // Initialisation du poids.
}

// Méthode statique retournant la valeur du compteur
public static function getCompteur()
{
return self::$compteur; }
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

public static function rouler()
{

echo "Le vehicule roule."; }

public function ajouter_personne(Personne $personne_ajouté)
{
    $this->poids = $this->poids + $personne_ajouté->poids;
    $personne_ajouté->poids = 0;
    $personne_ajouté->couleur = "";
}
//code non implémenté car méthode abstraite

}
?>