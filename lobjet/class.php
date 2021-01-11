<?php
    //chargement des classes
    include('Animal.class.php');
    include('Poisson.class.php');
    //instanciation de la classe Poisson qui appelle le constructeur de la classe Animal
    $poisson = new Poisson("gris",8);
    //mise à jour du type du poisson
    $poisson->setType(true);
    //instanciation de la classe Poisson qui appelle le constructeur de la classe Animal
    $autre_poisson = new Poisson("noir",5);
    //mise à jour du type du poisson
    $autre_poisson->setType(false);
    //appelle de la méthode affichant les attributs de la classe Poisson et Animal
    $poisson->manger_animal($autre_poisson);
    //lire le type par l'accesseur de sa propre classe
    echo "Le type du poisson mangé est:".$autre_poisson->getType()."<br />";
    //lire le poids par l'accesseur de la classe mère
    echo "Le poids du poisson mangé est:".$autre_poisson->getPoids()." kg<br />" ;
?>