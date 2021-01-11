<?php
class Quatre_roue extends Vehicule
{
private $nombre_porte; //type du vehicule
public function __construct($nombre_porte)
{

$this->nombre_porte = $nombre_porte; //écrit dans l'attribut nombre_porte

}
//méthode
public function repeindre($couleur)
{

parent::setCouleur($couleur);
}
}
?>