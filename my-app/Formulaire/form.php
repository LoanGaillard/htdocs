<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
    <title>Formulaire</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
    <?php
    session_start();
    if (isset($_SESSION["connecter"]) && $_SESSION["connecter"] == 'ok' && isset($_SESSION["id_personne"])) {
        echo("<h1>Formulaire d'ajout de contenu au blog</h1>
        <form action='Blog.php' method='post'>
            Titre :<input required type='texte'>
        <br>
            Commentaire :
        <br>    
            <textarea required name='comment'></textarea>
        <br>
        <br>
            Choisissez une photo avec une taille inférieure à 2 Mo
        <br>
        <br>
        <input required type='file' value=''>
        <br>
        <input type='submit' value='Envoyer'>
        </form>");
    }
    ?>
</body>
</html>