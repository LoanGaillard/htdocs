<?php
   try
   {
   $base = new PDO('mysql:host=127.0.0.1;dbname=base2', 'root', 'root');
   $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
   $sql = "INSERT INTO formulaire (Nom, Prenom, intit, debut, fin, email) VALUES (:nom, :prenom, :intit, :debut, :fin, :email)";
   // Préparation de la requête avec les marqueurs
   $resultat = $base->prepare($sql);
   $resultat->execute(array('nom' => $_POST['nom'],'prenom' => $_POST['prenom'],'intit' => $_POST['intit'],'debut' => $_POST['debut'],'fin' => $_POST['fin'],'email' => $_POST['email'] ));
   echo "L'identifiant de la dernière personne ajoutée est:";
   echo $base->lastInsertId().".";
   $resultat->closeCursor();
   }
   catch(Exception $e)
   {
   // message en cas d'erreur
   die('Erreur : '.$e->getMessage());
   }
   echo 'ok';
?>