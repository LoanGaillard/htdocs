<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-
strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
    <title>Exercice avec POST</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
    <form action="" method="post">
        <label for="plat_ingredient"> Liste des plats contenant l'ingrédient: </label>
        <select name="Ingrédient" id="oui">
            <?php
                $selected = 'plat_cuisines';
 
                // Parcours du tableau
                echo '<select name="ingredient">',"\n";
                for($i=1970; $i<=2030; $i++)
                {
                  // L'année est-elle l'année courante ?
                  if($i == date('Y'))
                  {
                    $selected = ' selected="selected"';
                  }
                  // Affichage de la ligne
                  echo "\t",'<option value="', $i ,'"', $selected ,'>', $i ,'</option>',"\n";
                  // Remise à zéro de $selected
                  $selected='';
                }
                echo '</select>',"\n";
              
            ?>
        </select>
    <br>
        Liste des plats contenant le mot suivant:<input required type="password" name="mdp">
    <br>
    <input type="submit" value="Envoyer">
    </form>
</body>
</html>