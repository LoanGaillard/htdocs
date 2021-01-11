<?php
    try{
        $base = new PDO('mysql:host=127.0.0.1;dbname=eval', 'root', 'root');
        $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $resultat = $base->prepare($sql);
        if (isset($_POST['nom']) && isset($_POST['prenom'])) {
            $id = uniqid();
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
        }
        $resultat->execute(array('id' => $id, 'nom' => $nom, 'prenom' => $prenom));
        // Ajout des données dans la table Personne
        header('Location:modif.php');
    }
    catch(Exception $e)
    {
    // message en cas d'erreur
    die('Erreur : '.$e->getMessage());
    }
?>