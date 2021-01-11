<html><body>
<?php
   $tab_caracteristique_dupont = array("prénom" => "PAUL","profession" => "ministre","age" => 50);
   $tab_caracteristique_durand = array("prénom" => "ROBERT","profession" => "agriculteur","age" => 45);
   $tab_personne['DUPONT'] = $tab_caracteristique_dupont;
   $tab_personne['DURAND'] = $tab_caracteristique_durand;
   echo $tab_personne['DURAND']['profession'];

   foreach($tab_personne as $key){
   foreach($ligne as $cle=>$valeur){
     // Affichage
     echo $cle.': '.$valeur;
     echo 
 }
}
?>
</body></html>