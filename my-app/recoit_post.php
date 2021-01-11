<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-
strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<title>Exercice avec POST</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>

nom :<input type="text" name="nom">
<br>
prenom :<input type="text" name="prenom">
<br>
password :<input type="password" name="password">
<br>
pass :<textarea name="txt" id="ok" cols="30" rows="10"></textarea>
<br>
choix du pays :
<br>
<input type="checkbox" name="pays[]" value="F" />France<br />
<input type="checkbox" name="pays[]" value="E" />Espagne<br />
<input type="checkbox" name="pays[]" value="R" />Russie<br />
<input type="checkbox" name="pays[]" value="A" />Allemagne<br />

<?php echo $_POST["prenom"];?>
<?php echo $_POST["nom"];?>
<?php echo $_POST["password"];?>
<?php echo $_POST["txt"];?>
<?php if (isset($_POST["pays"])) {echo $_POST["pays"];}?>

</body>
</html>