<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="table1_gestion.php">Retour</a>	
	<hr>
<h1>gestion des guides</h1>
<h2>vous venez d'ajouter un guide</h2>
<hr>
<table>
<tbody>
<?php
$ville=$_POST['ville'];
$pays=$_POST['pays'];
$age=$_POST['budget'];
$note=$_POST['note'];
$horaire=$_POST['horaire'];

$mabd = new PDO('mysql:host=localhost;dbname=sae203base;charset=UTF8;', 'mmi22c11', 'L8Fi8>(2N_xi');
$mabd->query('SET NAMES utf8;');

$req = 'INSERT INTO destinations(dest_nom, dest_pays, dest_budget, dest_note, dest_fus_horaire) 
        VALUES("'.$ville.'","'.$pays.'", "'.$budget.'", "'.$note.'",  "'.$horaire.'")';
$resultat = $mabd->query($req);
?>

</tbody>
</table>
</body>
</html>