<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Formulaire</title>
</head>
<body>
<?php
    //permet de ce connecter à la base de donnée
    $base = new PDO('mysql:host=127.0.0.1;dbname=eval', 'root', 'root');
    $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO stagiaire (id, nom, prenom,) VALUES (:id, :nom, :prenom,) ";
    $resultat = $base->prepare($sql);
?>
<div class="container">
    <form action="verifForm.php" method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputNom">Nom</label>
                <input required type="text" class="form-control" name="nom">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPrenom">Prenom</label>
                <input required type="text" class="form-control" name="prenom">
            </div>
        </div>
            <div class="form-group">
                <label for="inputState">Nationalité</label>
                <select id="inputState" class="form-control" name="id_nationalite">
                    <option disaple></option>
                    <?php
                    $sql = "SELECT * FROM nationalite";
                    $resultat = $base->prepare($sql);
                    $resultat->execute();
                    while ($ligne = $resultat->fetch()) {
                        echo'<option value="'.$ligne['Id_nationalite'].'">'.$ligne['Libelle'].'</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="inputState">Type de la formation</label>
                <select id="inputState" class="form-control">
                <?php
                $sql = "SELECT * FROM type_formation";
                $resultat = $base->prepare($sql);
                $resultat->execute();
                while ($ligne = $resultat->fetch()) {
                    echo'<option value="'.$ligne['Id_type_formation'].'">'.$ligne['Libelle'].'</option>';
                }
                ?>
                </select>
            </div>
            <label for="formateur">Formateur par date :</label>
            <br>
            <label for='".$res["Id_formateur"]."' name='date".$res["Id_formateur"]."'>dans la salle 
                début : <input type='date' class='date debut".$res["Id_formateur"]."' name='debut[]' value='".date("Y-m-j")."'>, 
                fin : <input type='date' class='date fin".$res["Id_formateur"]."' name='fin[]' value='".date("Y-m-j")."'></label>
            <?php
            try {
            $sql = "SELECT * FROM formateur
            JOIN salle ON formateur.id_salle = salle.id_salle";
            $resultat = $base->prepare($sql);
            $resultat->execute();
            while($res = $resultat->fetch()){
                $sql = "SELECT * FROM type_formation_formateur
                JOIN type_formation ON type_formation_formateur.Id_type_formation = type_formation.Id_type_formation
                WHERE Id_formateur = ".$res["Id_formateur"];
                $resultat = $base->prepare($sql);
                $resultat->execute();
                $ok = "";
                while($form = $resultat->fetch()){
                    $ok =  $ok ." ".$form["Id_type_formation"];
                }
                echo "<span class='return'></span>";
                echo "<input class='oui ".$ok."' type='checkbox' name='formateur[]' id='".$res["Id_formateur"]."' value='".$res["Id_formateur"]."' onchange='check(event,".$res["Id_formateur"].")'>";
                echo "<label for='".$res["Id_formateur"]."' name='date".$res["Id_formateur"]."'>".$res["Prenom"]." ".$res["Nom"]." dans la salle ".$res["Id_salle"].",
                début : <input type='date' class='date debut".$res["Id_formateur"]."' name='debut[]' value='".date("Y-m-j")."'>,
                fin : <input type='date' class='date fin".$res["Id_formateur"]."' name='fin[]' value='".date("Y-m-j")."'></label>";
            }

            $resultat->closeCursor();
            }
            catch (Exception $e) {
                // message en cas d'erreur
                die('Erreur : ' . $e->getMessage());
            }
            ?>
            <br>
            <input type="submit" value="Envoyer">
    </form>
</body>
<?php
if (isset($_GET["date"])) {
    echo "Une date est invalide";
}
?>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</html>