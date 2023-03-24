<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="table2_gestion.php">Retour</a> 	
	<hr>
<h1>Gestion des guides</h1>
<p>Modification d'un guide</p>
<?php
	$num = $_GET['num'];
    $mabd = new PDO('mysql:host=localhost;dbname=sae203base;charset=UTF8;', 'mmi22c11', 'L8Fi8>(2N_xi');
    $mabd->query('SET NAMES utf8;');
    $req = 'SELECT * FROM  guide WHERE guide_id = ' . $num;
    $resultat = $mabd->query($req);
    $album = $resultat->fetch();
 ?>
<hr>
<form method="POST" action="table2_modif_valide.php" enctype="multipart/form-data">
    <input type="hidden" name="num"  value="<?php echo $album['guide_id']; ?>">
    Nom:<input type="text" name="nom" value="<?php echo $album['guide_nom'] ?>" ><br>
    Prenom:<input type="text" name="prenom" value="<?php echo $album['guide_prenom'] ?>" ><br>
    Age:<input type="text" name="age" value="<?php echo $album['guide_age'] ?>" ><br>
    Nationnalité:
    <select name="nation">
    	<?php
            $mabd = new PDO('mysql:host=localhost;dbname=sae203base;charset=UTF8;', 'mmi22c11', 'L8Fi8>(2N_xi');
            $mabd->query('SET NAMES utf8;');
            $req = "SELECT * FROM  nation ";
            $resultat = $mabd->query($req);
    
            foreach ($resultat as $value) {

                $selection="";
                if($nation == $value['nation_nom']) $selection="selected";          
                echo '<option '.$selection . ' value="' .  $value['nation_id'] . '"> ' .  $value['nation_nom'] . '</option>';
        }
         ?>
    </select>
    <br>
    Photo:<input type="file" name="photo" /><br />
    <input type="submit" name="ajouter">
</form>

</body>
</html>