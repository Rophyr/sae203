<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="table2_gestion.php">Retour</a> 	
	<hr>
<h1>Gestion des guides</h1>
<p>Ajouter un guide</p>
<hr>
<form method="POST" action="table2_new_valide.php" enctype="multipart/form-data">
    <label>Nom:</label>
    <input type="text" name="nom" required><br>
    <label>Prenom:</label>
    <input type="text" name="prenom" required><br>
    <label>Age:</label>
    <input type="text" name="age" required><br>
    <label>Photo:</label>
    <input type="file" name="photo" required /><br />
    <label>Pays de résidence:</label>
    <select name="nation">
    	<?php
            $mabd = new PDO('mysql:host=localhost;dbname=sae203base;charset=UTF8;', 'root', 'root');
            $mabd->query('SET NAMES utf8;');
            $req = "SELECT * FROM  nation ";
            $resultat = $mabd->query($req);
    
            foreach ($resultat as $value) {

                $selection="";
                if($nation == $value['nation_id']) $selection="selected";          
                echo '<option '.$selection . ' value="' .  $value['nation_id'] . '"> ' .  $value['nation_nom'] . '</option>';
        }
         ?>
    </select>
    <input type="submit" name="ajouter">
</form>

</form>
</body>
</html>