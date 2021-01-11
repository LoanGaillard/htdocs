<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-
strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head> <title>Exercice sur les fichiers</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> </head>
<body>

<form action="exemple.php" method="POST" enctype="multipart/form-data">
<input type="hidden" name="MAX_FILE_SIZE" value="2097152">
<p>Choisissez une photo avec une taille inférieure à 2 Mo.</p>
<input type="file" name="photo">
<br />
<input type="submit" name="ok" value="Envoyer">

</form>
</body></html>
<pre><?php
if ($_FILES['photo']['error']) {

switch ($_FILES['photo']['error']){

case 1: // UPLOAD_ERR_INI_SIZE

echo "La taille du fichier est plus grande que la limite autorisée par le serveur

(paramètre upload_max_filesize du fichier php.ini).";
break;

case 2: // UPLOAD_ERR_FORM_SIZE

echo "La taille du fichier est plus grande que la limite autorisée par le

formulaire (paramètre post_max_size du fichier php.ini).";

break;

case 3: // UPLOAD_ERR_PARTIAL

echo "L'envoi du fichier a été interrompu pendant le transfert.";
break;

case 4: // UPLOAD_ERR_NO_FILE

echo "La taille du fichier que vous avez envoyé est nulle." ; break;

}

}
else {
    //si il n'ya pas d'erreur alors $_FILES['nom_du_fichier']['error'] vaut 0
    echo "Aucune erreur dans l'upload du fichier.<br />";
    if ((isset($_FILES['photo']['name'])&&($_FILES['photo']['error'] == UPLOAD_ERR_OK))) {
    
    $chemin_destination = 'image/';
    //déplacement du fichier du répertoire temporaire (stocké par défaut) dans le répertoire de destination avec la fonction move_uploaded_file($fichier_uploadé, $dossier_nom_fichier_destination);
    
    move_uploaded_file($_FILES['photo']['tmp_name'],
    
    $chemin_destination.$_FILES['photo']['name']);
    
    echo "Le fichier ".$_FILES['photo']['name']." a été copié dans le répertoire fichiers";
    
    }
    else {
    
    echo "Le fichier n'a pas pu être copié dans le répertoire fichiers.";
    
    }
    
    }
    ?>