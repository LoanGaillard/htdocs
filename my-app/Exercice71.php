<?php
    $contenu = file_get_contents('ok.txt');
    file_put_contents("ok.txt",((int)$contenu+1));

    $contenu = file_get_contents('ok.txt');
    echo $contenu;
?>