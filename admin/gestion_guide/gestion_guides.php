<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="../gestion_index.php">Retour</a> 	
	<hr>
<h1>gestion des guides</h1>
<p>pensez a proteger le dossier admin avec un htaccess :-)</p>
<hr>
<a href="ajouter.php">ajouter un guide</a>
<table border=1>
	<thead>
		<tr><td>nom</td><td>prenom</td><td>age</td><td>nationnalité</td><td>supprimer</td><td>modifier</td></tr>
	</thead>
	<tbody>
<?php
$mabd = new PDO('mysql:host=localhost;dbname=sae203base;charset=UTF8;', 'mmi22c11', 'L8Fi8>(2N_xi');
$mabd->query('SET NAMES utf8;');
$req = "SELECT * FROM guide";
$resultat = $mabd->query($req);

foreach ($resultat as $value) {
    echo '<tr>' ;
    echo '<td>'.$value['guide_nom'] . '</td>';
    echo '<td>' . $value['guide_prenom'] . '</td>';
    echo '<td>' . $value['guide_age'] . '</td>';
    echo '<td>' . $value['guide_nation'] . '</td>';
    echo '<td> <a href="supprimer.php?num=' .$value['guide_id'].' " > Supprimer </a> </td>';
    echo '<td> <a href="modifier.php?num='.$value['guide_id'].' " > Modifier </a> </td>';

    echo '</tr>';
}
?>

</tbody>
</table>
</body>
</html>