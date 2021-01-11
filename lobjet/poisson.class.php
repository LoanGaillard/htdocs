<?php
class Poisson extends Animal
{

private $vivant_en_mer; //type du poisson
//accesseurs
public function getType()
{
if ($this->vivant_en_mer) {

return "vivant en mer"; //retourne le type

}
else if ($this->vivant_en_mer === false) {

return "ne vivant pas en mer"; //retourne le type

}
else {

return "";

}

}
public function setType($vivant_en_mer)
{

$this->vivant_en_mer = $vivant_en_mer; //écrit dans l'attribut vivant_en_mer

}
//méthode

public function nager()
{

echo "Je nage <br />";
}

public function respire()
{

echo "Le poisson respire.<br />";

}

public function manger_animal(Animal $animal_mangé)
{

// Appelle la méthode manger_animal() de la classe parente, c'est-à-dire Animal
parent::manger_animal($animal_mangé);
if(method_exists($animal_mangé, "setRace")) {
$animal_mangé->setRace("");
}
if (isset($animal_mangé->vivant_en_mer)){
$animal_mangé->vivant_en_mer="";
}
}
}
?>