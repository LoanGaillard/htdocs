<?php
    try{
        $base = new PDO('mysql:host=127.0.0.1;dbname=formulaire', 'root', 'root');
        $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO user (id_personne, nom, prenom, mdp) VALUES (:id_personne, :nom, :prenom, :mdp) ";
        $resultat = $base->prepare($sql);
        if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mdp'])) {
            $id_personne = uniqid();
            $nom = $_POST['nom'];
            $mdp = hash('SHA256', $_POST['mdp']);
            $prenom = $_POST['prenom'];
        }
        $resultat->execute(array('id_personne' => $id_personne, 'nom' => $nom, 'prenom' => $prenom, 'mdp' => $mdp));
        // Ajout des données dans la table Personne
        header('Location:Login3.php');
    }
    catch(Exception $e)
    {
    // message en cas d'erreur
    die('Erreur : '.$e->getMessage());
    }
?>