<?php
session_start();
$ok = 0;
    try{
        $base = new PDO('mysql:host=127.0.0.1;dbname=formulaire', 'root', 'root');
        $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT id_personne, nom, prenom, mdp FROM user WHERE nom like :nom AND prenom like :prenom AND mdp like :mdp ";
        $resultat = $base->prepare($sql);
        $resultat->execute(array('nom' => $_POST['nom'], 'prenom' => $_POST['prenom'], 'mdp' => hash('SHA256', $_POST['mdp'])));
        while ($ligne = $resultat->fetch())
        {
            if ($_POST['nom'] == $ligne['nom'] && $_POST['prenom'] == $ligne['prenom'] &&  hash('SHA256', $_POST['mdp']) == $ligne['mdp']) {
                $ok = 1;
                $_SESSION["nom"] = $ligne["nom"];
                $_SESSION["prenom"] = $ligne["prenom"];
                $_SESSION["mdp"] = $ligne["mdp"];
                $_SESSION['id_personne'] = $ligne['id_personne'];
            }
        }
        if ($ok == 1) {
            $_SESSION["connecter"] = 'ok';
            header('Location:form.php');
        }else {
            header('Location:Login3.php');
        }
        $resultat->closeCursor();
    }
    catch(Exception $e)
    {
    die('Erreur : '.$e->getMessage());
    }
?>