<!DOCTYPE html>
<html>
<head>
	<title>Résultats de recherche</title>
</head>
<body>
	<h1>Résultats de recherche</h1>
	<?php
		if(isset($_GET['pays'])) {
			$pays = $_GET['pays'];
			echo "Voici les guides disponibles en $pays";
		} else {
			echo "Veuillez saisir un pays";
		}
	?>
</body>
</html>