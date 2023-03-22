<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="gestion_index.php">retour</a> 	
	<hr>
<h1>gestion de nos albums</h1>
<p>pensez a proteger le dossier admin avec un htaccess :-)</p>
<hr>
<a href="ajouter.php">ajouter un album</a>
<table border=1>
	<thead>
		<tr><td>titre</td><td>prix</td><td>nombre de page</td><td>supprimer</td><td>modifier</td></tr>
	</thead>
	<tbody>
<?php
$mabd = new PDO('mysql:host=localhost;dbname=sae203base;charset=UTF8;', 'root', 'root');
$mabd->query('SET NAMES utf8;');
$req = "SELECT * FROM bandes_dessinees";
$resultat = $mabd->query($req);

foreach ($resultat as $value) {
    echo '<tr>' ;
    echo '<td>'.$value['bd_titre'] . '</td>';
    echo '<td>' . $value['bd_prix'] . '</td>';
    echo '<td>' . $value['bd_nb_pages'] . '</td>';
    echo '<td> <a href="supprimer.php?num=' .$value['bd_id'].' " > supprimer </a> </td>';
    echo '<td> <a href="modifier.php?num='.$value['bd_id'].' " > modifier </a> </td>';

    echo '</tr>';
}
?>

</tbody>
</table>
</body>
</html>