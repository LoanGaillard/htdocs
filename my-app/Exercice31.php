<?php
    $phrase = ("Bonjour Monsieur Durand");
    $phrase1 = strtoupper($phrase);
    echo $phrase1;
?>

<?php
    echo'<br></br>';
    $email = "jean.dupont@france.fr";
    $ok = strpos($email,'@');
    $condition2 = strpos($email,'.');

    if ($ok && $condition2) {
        echo 'GG ton mail est correct';
    }
    else {
        echo 't\'es un imposteur c\'est pas ton mail';
    }
?>