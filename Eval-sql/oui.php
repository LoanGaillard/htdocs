<?php
//Unclude database call
include 'db.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>  
    <title>Inserer un stagiaire</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>

<?php
if(isset($_GET['success'])) {echo'Le stagiaire a été ajouté!';} 
if(isset($_GET['error']) && $_GET['error']=="error") {echo'Veuillez remplir tout les champs!';} 
if(isset($_GET['error']) && $_GET['error']=="dates") {echo'Veuillez remplir des dates valides!';} 
?>

<h1>Inserer un stagiaire en formation : </h1>
<form action="checkPost.php" method="POST" enctype="multipart/form-data">
    Nom : <input type="text" name="name" required/><br/>
    Prénom : <input type="text" name="firstname" required/><br/><br>
    Nationalité :   <select  name="nation" >
                        <option disabled></option>
                        <?php
                        //Lister les nationalités
                        $sql = "SELECT * FROM nationalite";
                        $resultat = $base->prepare($sql);
                        $resultat->execute();
                        while ($ligne = $resultat->fetch()) {
                            echo'<option value="'.$ligne['id_nationalite'].'">'.$ligne['Libelle'].'</option>';
                        }
                        
                        ?>
                    </select><br><br>
    Type de la formation :  <select  id="selectFormation" name="formation">
                                <option></option>
                                <?php
                                    //Lister les formations
                                    $sql = "SELECT * FROM type_formation";
                                    $resultat = $base->prepare($sql);
                                    $resultat->execute();
                                    while ($ligne = $resultat->fetch()) {
                                        echo'<option value="'.$ligne['id_type_formation'].'">'.$ligne['Libelle'].'</option>';
                                    }
                                    
                                ?>
                            </select><br><br>
    Formateurs par date ;<br>
                                <?php
                                    //Lister les formateurs
                                    $sql = "SELECT * FROM formateur
                                    JOIN salle ON formateur.id_salle = salle.id_salle
                                    JOIN type_formation_formateur ON formateur.id_formateur = type_formation_formateur.id_formateur";
                                    $resultat = $base->prepare($sql);
                                    $resultat->execute();
                                    
                                    while ($ligne = $resultat->fetch()) {
                                        echo'<div class="formateur '.$ligne['id_type_formation'].'"><input class="checkboxFormateurs" type="checkbox" name="formateurName[]" value="'.$ligne['id_formateur'].'"/> '.$ligne['Prenom'].' '.$ligne['Nom'].' dans la salle '.$ligne['Numero'].' - Début : <input type="date" name="debut'.$ligne['id_formateur'].'"/> - Fin : <input type="date" name="fin'.$ligne['id_formateur'].'"/></div>';
                                    }
                                
                                ?>


<input type="submit" name="ok" value="Envoyer">
</form>
<button onclick="supprimer()">Supprimer un stagiaire</button>
<button onclick="modifier()">Modifier un stagiaire</button>
</body>
<script>function supprimer(){window.location="supprimer_stagiaire.php"}function modifier(){window.location="modifier_stagiaire.php"}</script>
</body>
<script>
setInterval(function(){ 
    //Get -> Type de formation
    var selectFormationElement = document.getElementById("selectFormation").value;
    //Get -> Div formateurs
    var divFormateurElement = document.getElementsByClassName("formateur");

    for(var i=0; i<divFormateurElement.length; i++){

        if(selectFormationElement != divFormateurElement[i].classList[1]){
            var inputs = divFormateurElement[i].getElementsByTagName('input');
            for(var y=0; y<inputs.length; y++){
                inputs[y].setAttribute("disabled", "disabled");
            }
        } else {
            var inputs = divFormateurElement[i].getElementsByTagName('input');
            for(var y=0; y<inputs.length; y++){
                inputs[y].removeAttribute("disabled", "disabled");
            }
        }
    }
}, 500);

    

</script>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./all.css">
</head>
<body>
<?php
// --- Ajoute l'appel a la base --- \\
include "request.php";
?>
<form action="ajout_verif.php" method="post">
    <label for="nom">Nom :</label>
    <input type="text" name="nom" id="nom" placeholder="Nom" required>
    <span class="return"></span>
    <label for="prenom">Prénom :</label>
    <input type="text" name="prenom" id="prenom" placeholder="Prénom" required>
    <span class="return"></span>
    <label for="nation">Nationalité :</label>
    <select name="nation" id="nation" required>
        <?php
        try {
            // --- Récupère toute les nationalités --- \\
            $sql = "SELECT * FROM nationalite";
            $resultat = $base->prepare($sql);
            $resultat->execute();
            // --- Les met toutes dans des option --- \\
            while($res = $resultat->fetch()){
                echo "<option value='".$res["id_nationalite"]."'>".$res["libelle"]."</option>";
            }

            $resultat->closeCursor();
        }
        catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        ?>
    </select>
    <span class="return"></span>
    <label for="form">Type de formation :</label>
    <select name="form" id="form" onchange="modif()" >
        <?php
        try {
            // --- Récupère tout les types de formations --- \\
            $sql = "SELECT * FROM type_formation";
            $resultat = $base->prepare($sql);
            $resultat->execute();
            // --- Les met dans des option --- \\
            while($res = $resultat->fetch()){
                echo "<option value='".$res["id_type_formation"]."'>".$res["libelle"]."</option>";
            }

            $resultat->closeCursor();
        }
        catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        ?>
    </select>
    <span class="return"></span>
    <label for="formateur">Formateur par date :</label>
    <?php
        try {
            // --- Récupère tout les formateurs et leur salle --- \\
            $sql = "SELECT * FROM formateur
            JOIN salle ON formateur.id_salle = salle.id_salle";
            $resultat = $base->prepare($sql);
            $resultat->execute();
            while($res = $resultat->fetch()){
                // --- Récupère les type de formations associer au formateur --- \\
                $sql2 = "SELECT * FROM type_format_formateur
                JOIN type_formation ON type_format_formateur.id_type_formation = type_formation.id_type_formation
                WHERE id_formateur = ".$res["id_formateur"];
                $resultat2 = $base->prepare($sql2);
                $resultat2->execute();
                $tout = "";
                // --- Met toute les formation du formateur dans une variable --- \\
                while($ligne = $resultat2->fetch()){
                    $tout =  $tout ." ".$ligne["id_type_formation"];
                }
                // --- Affiche le nom,le prénom,la salle du formateur. Affiche aussi les dates de début et de fin de formation --- \\
                echo "<span class='return'></span>";
                echo "<input class='check ".$tout."' type='checkbox' name='formateur[]' id='".$res["id_formateur"]."' value='".$res["id_formateur"]."' onchange='check(event,".$res["id_formateur"].")'>";
                echo "<label for='".$res["id_formateur"]."' name='date".$res["id_formateur"]."'>".$res["prenom"]." ".$res["nom"]." dans la salle ".$res["libelle"].", 
                début : <input type='date' class='date debut".$res["id_formateur"]."' name='debut[]' value='".date("Y-m-j")."'>, 
                fin : <input type='date' class='date fin".$res["id_formateur"]."' name='fin[]' value='".date("Y-m-j")."'></label>";
            }

            $resultat->closeCursor();
        }
        catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        
        finally {
            $base = null; //fermeture de la connexion
        }
        ?>
        <span class="return"></span>
        <input type="submit" value="Envoyer">
</form>
<div>
<?php
if (isset($_GET["date"])) {
    echo "Une date est invalide";
}
?>
</div>
<?php
include "menu.php";
?>
</body>
<script src="ajout.js"></script>
<style>

</style>
</html>