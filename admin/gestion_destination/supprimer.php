<!DOCTYPE html>
<html>
<head><title></title></head>
<body>
<a href="gestion_dest.php">Retour</a> 	
<hr> <h1>gestion des guides</h1> <hr>

<?php
$bd_id=$_GET['num'];

$mabd = new PDO('mysql:host=localhost;dbname=sae203base;charset=UTF8;', 'mmi22c11', 'L8Fi8>(2N_xi');
$mabd->query('SET NAMES utf8;');

$req = 'DELETE FROM guide WHERE guide_id='.$bd_id; 

echo $req;
 
$resultat = $mabd->query($req);

echo '<h2>vous venez de supprimer le guide n°'.$bd_id.' </h2>';
?>

</body>
</html>