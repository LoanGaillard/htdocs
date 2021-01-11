<?php
    $pass = "bob";
    $login = "bob";
    if (isset($_POST["nom"])) {
        $user = htmlspecialchars (addslashes(trim($_POST['nom'])));
        if (isset($_POST["password"])) {
            $password = htmlspecialchars (addslashes(trim($_POST['password'])));
        if ($pass==$password&&$login==$user) {
            header("Location:ajout_ville.php");
        }
        else {
            echo "Votre nom ou mots de passe est incorrect veuiller réessayé.";
        }
            }
        }
    $contenu = file_get_contents('Eval.php');
    echo $contenu;
?>