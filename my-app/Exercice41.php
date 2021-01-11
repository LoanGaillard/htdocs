<?php
    $num = -999;
    if (preg_match("/^-?[0-9]{1-3}$/",$num)==true) {
        echo 'true';
    }
    else {
        echo 'false';
    }
?>
