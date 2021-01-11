<?php
    $contenu = file_get_contents('Exercice114.php');
    echo $contenu;
    $cool = [];
    include("./mots.php");

    function alea($mots){
        global $demo;
        $dej=1;
        $max=1;
        while($dej==1&&$max<coun($mots)-1){
            $aleat=round(rand(0,count($dej)));
            
        }
    }
?>