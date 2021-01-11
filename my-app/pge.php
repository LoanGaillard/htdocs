<?php
$contenu = "Bonjour Mr Dupont.";
file_put_contents("fichier.txt",$contenu);
$contenu = file_get_contents('fichier.txt');
echo $contenu;
?>