<?php
    //chargement des classes
    include('Exo.class.php');
    include('Quatre_roue.class.php');
    $vehicule = new Vehicule("noir", 1500);
    $vehicule-> rouler();
    $vehicule-> ajouter_personne(70);
?>