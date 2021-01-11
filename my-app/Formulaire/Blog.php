<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
    <title>Formulaire</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<?php
    session_start();
?>
<body>
    <h1>Blog</h1>
    <br>
    <br>
    <h2>Bienvenue</h2>
    <?php
        if (isset($_POST['datePost']) && isset($_POST['Titre']) && isset($_POST['Commentaire'])  && isset($_POST['img'])  && isset($_POST['id_user'])) {
        $base = new PDO('mysql:host=127.0.0.1;dbname=formulaire', 'root', 'root');
        $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO article (Id_article, datePost, Titre, Commentaire, img, id_user) VALUES (:Id_article, :datePost, :Titre, :Commentaire, :img, :id_user) ";
        $resultat = $base->prepare($sql);
            $id_article = uniqid();
            $datePost = $_POST['datePost'];
            $Titre = $_POST['Titre'];
            $Commentaire = $_POST['Commentaire'];
            $img = $_POST['img'];
            $id_user = uniqid();
        $resultat->execute(array('Id_article' => $Id_article, 'datePost' => $datePost, 'Titre' => $Titre, 'Commentaire' => $Commentaire, 'img' => $img, 'id_user' => $id_user,));
        $date = date('Y-m-d H:i:s');
        }
        echo $date;
    ?>
    <a href="./form.php"><input type="submit" value="Retour au formulaire"></a>
    <a href="./login3.php"><input type="submit" value="Retour au login"></a>
    
</body>
</html>