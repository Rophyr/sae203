<?php
    if ( (empty($_POST['region']))) {
        header('Location: form_recherche.php');
    }
$region = $_POST['region'];
$region_nettoye =  filter_var( $region ,  FILTER_SANITIZE_SPECIAL_CHARS );
?>

<!DOCTYPE html>
<html>
<head>
  <title>Réponse recherche</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tilt+Warp&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>

<body>

<?php  require 'header.php'; ?>

<main>

<?php
$mabd = new PDO('mysql:host=localhost;dbname=sae203Base;charset=UTF8;', 'mmi22c11', 'L8Fi8>(2N_xi');
$mabd->query('SET NAMES utf8;');


if (isset($_POST['region'])) {
    
    $req = "SELECT * FROM destinations INNER JOIN guide ON destinations._guides_id = destinations.guides_id WHERE LOWER(dest_pays) LIKE LOWER('%" . $dest_nettoye . "%') OR LOWER(dest_nom) LIKE LOWER('%" . $dest_nettoye . "%')";
    $resultat = $mabd->query($req);
    
    echo '<h1>Résultats pour ' . htmlspecialchars($dest_nettoye) . '</h1>';

    foreach ($resultat as $value) {

        echo '<p> <img src="' . $value['guide_photo'] . '" alt="' . $value['dest_pays'] . '"> </p>';
        echo '<div>' ;
        echo '<h3>'.$value['dest_pays'] .'</h3>';
        echo '<p>Ville :'. $value['dest_nom'] .'</p>';
        echo '<p>Guide Prenom:'. $value['guide_prenom'] .'</p>';
        echo '<p>Guide Nom :'. $value['guide_nom'] .'</p>';
        echo '<p>Budget :'. $value['dest_budget'] .'%</p>';
        
    }
}
?>

    </main>

<section class="first">
<div class="container">

</div>

<?php  require 'footer.php'; ?>

</body>

</html>