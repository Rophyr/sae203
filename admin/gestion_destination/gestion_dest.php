<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="../gestion_index.php">retour</a> 	
	<hr>
<h1>Gestion des destinations</h1>
<p>pensez a proteger le dossier admin avec un htaccess :-)</p>
<hr>
<a href="ajouter.php">ajouter une destinations</a>
<table border=1>
	<thead>
		<tr><td>ville</td><td>pays</td><td>budget</td><td>note</td><td>date</td><td>supprimer</td><td>modifier</td></tr>
	</thead>
	<tbody>
<?php
$mabd = new PDO('mysql:host=localhost;dbname=sae203base;charset=UTF8;', 'root', 'root');
$mabd->query('SET NAMES utf8;');
$req = "SELECT * FROM destinations";
$resultat = $mabd->query($req);

foreach ($resultat as $value) {
    echo '<tr>' ;
    echo '<td>' . $value['dest_nom'] . '</td>';
    echo '<td>' . $value['dest_pays'] . '</td>';
    echo '<td>' . $value['dest_budget'] . '</td>';
    echo '<td>' . $value['dest_note'] . '</td>';
    echo '<td>' . $value['dest_date'] . '</td>';
    echo '<td> <a href="supprimer.php?num=' .$value['dest_id'].' " > supprimer </a> </td>';
    echo '<td> <a href="modifier.php?num='.$value['dest_id'].' " > modifier </a> </td>';

    echo '</tr>';
}
?>

</tbody>
</table>
</body>
</html>