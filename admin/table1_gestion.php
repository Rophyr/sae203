<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="admin.php">Retour</a> 		
	<hr>
<h1>Gestion des destinations</h1>
<hr>
<a href="table1_new_form.php">Ajouter une destinations</a>
<table border=1>
	<thead>
		<tr><td>Ville</td><td>Pays</td><td>Budget</td><td>Note</td><td>Date</td><td>Supprimer</td><td>Modifier</td></tr>
	</thead>
	<tbody>
<?php
$mabd = new PDO('mysql:host=localhost;dbname=sae203base;charset=UTF8;', 'mmi22c11', 'L8Fi8>(2N_xi');
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
    echo '<td> <a href="table1_delete.php?num=' .$value['dest_id'].' " > Supprimer </a> </td>';
    echo '<td> <a href="table1_modif.php?num='.$value['dest_id'].' " > Modifier </a> </td>';

    echo '</tr>';
}
?>

</tbody>
</table>
</body>
</html>