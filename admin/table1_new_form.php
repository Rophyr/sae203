<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="table1_gestion.php">Retour</a>
	<hr>
<h1>Gestion des destinations</h1>
<p>Ajouter une destination</p>
<hr>
<form method="POST" action="table1_modif_valide.php" enctype="multipart/form-data">
    <input type="hidden" name="num"  value="<?php echo $destinations['dest_id']; ?>">
    Ville:<input type="text" name="ville" value="<?php echo $destinations['dest_nom'] ?>" ><br>
    Pays:
    <select name="pays">
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
    Budget:<input type="text" name="budget" value="<?php echo $destinations['dest_budget'] ?>" ><br>
    Note:<input type="text" name="note" value="<?php echo $destinations['dest_note'] ?>" ><br>
    Fuseau horaire:<input type="text" name="horaire" value="<?php echo $destinations['dest_fus_hor'] ?>" ><br>
    photo:<input type="file" name="photo" /><br />
    <input type="submit" name="ajouter">
</form>

</form>
</body>
</html>