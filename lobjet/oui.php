<?php
namespace Projet;
include('espace_nom.php');
// Affichage de l’espace de noms courant.
echo 'Espace de noms courant = ', __NAMESPACE__,'<br />';
\Biliotheque\maFonction(); //Appel du namespace Biliotheque à la racine
echo \Biliotheque\PI."<br />";
$chien = new \Biliotheque\Animal();
$chien->setCouleur("noir");
echo "La couleur du chien est:".$chien->getCouleur();
?>