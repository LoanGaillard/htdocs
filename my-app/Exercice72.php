<?php
    $contenu = file_get_contents("./image/Image.txt");
    copy("./image/msi-dragon.jpg","./archive/archive1.jpg");
    file_put_contents("./img.txt",$contenu."./image/msi-dragon.jpg".round(filesize("./image/msi-dragon.jpg")/1000)." ko \n");

    $contenu = file_get_contents("./image/Image.txt");
    copy("./image/paysage.jpg","./archive/archive2.jpg");
    file_put_contents("./img.txt",$contenu."./image/paysage.jpg".round(filesize("./image/paysage.jpg")/1000)." ko \n");

    $contenu = file_get_contents("./image/Image.txt");
    copy("./image/paysage2.jpg","./archive/archive3.jpg");
    file_put_contents("./img.txt",$contenu."./image/paysage2.jpg".round(filesize("./image/paysage2.jpg")/1000)." ko \n");

    echo $contenu;
?>