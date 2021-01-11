<?php
    try{
        $base = new PDO('mysql:host=127.0.0.1;dbname=plats_cuisines', 'root', 'root');
        $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT nom, mdp FROM login WHERE nom = :nom AND mdp = :mdp ";
        $resultat = $base->prepare($sql);
        $resultat->execute(array('nom' => $_POST['nom'], 'mdp' => $_POST['mdp']));
        if ($ligne = $resultat->fetch())
        {
            header('Location: Home.php');
        }
        else {
            header('Location: Couizine.php');
        }
        $resultat->closeCursor();
    }
    catch(Exception $e)
    {
    die('Erreur : '.$e->getMessage());
    }
?>