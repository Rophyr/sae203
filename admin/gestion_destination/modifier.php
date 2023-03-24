<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="gestion_dest.php">retour</a> 	
	<hr>
<h1>gestion des guides</h1>
<p>modification d'un guide</p>
<?php
	$num = $_GET['num'];
    $mabd = new PDO('mysql:host=localhost;dbname=sae203base;charset=UTF8;', 'root', 'root');
    $mabd->query('SET NAMES utf8;');
    $req = 'SELECT * FROM  destinations WHERE dest_id = ' . $num;
    $resultat = $mabd->query($req);
    $destinations = $resultat->fetch();
 ?>
<hr>
<form method="POST" action="valid_modif.php" enctype="multipart/form-data">
    <input type="hidden" name="num"  value="<?php echo $destinations['dest_id']; ?>">
    Ville:<input type="text" name="ville" value="<?php echo $destinations['dest_nom'] ?>" ><br>
    Pays:
    <select name="pays">
    	<?php
			$mabd = new PDO('mysql:host=localhost;dbname=sae203base;charset=UTF8;', 'root', 'root');
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
    Budget:<input type="text" name="budget" value="<?php echo $destinations['dest_budget'] ?>" ><br>
    Note:<input type="text" name="note" value="<?php echo $destinations['dest_note'] ?>" ><br>
    Fuseau horaire:<input type="text" name="horaire" value="<?php echo $destinations['dest_fus_hor'] ?>" ><br>
    photo:<input type="file" name="photo" /><br />
    <input type="submit" name="ajouter">
</form>

</body>
</html>