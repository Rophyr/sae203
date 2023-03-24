<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="table2_gestion.php">Retour</a> 	
	<hr>
<h1>Gestion des guides</h1>
<h2>Vous venez d'ajouter un guide</h2>
<hr>
<table>
<tbody>
<?php
$prenom=$_POST['prenom'];
$nom=$_POST['nom'];
$age=$_POST['age'];
$nation=$_POST['nation'];

$mabd = new PDO('mysql:host=localhost;dbname=sae203base;charset=UTF8;', 'mmi22c11', 'L8Fi8>(2N_xi');
$mabd->query('SET NAMES utf8;');

// Check if an image was uploaded
if (isset($_FILES['photo']) && isset($_FILES['photo']['type'])) {
    $imageType = $_FILES['photo']['type'];

    // Check if the image is a valid type
    if (($imageType != "image/png") &&
        ($imageType != "image/jpg") &&
        ($imageType != "image/jpeg")) {
        echo '<p>Désolé, le type d\'image n\'est pas reconnu !';
        echo 'Seuls les formats PNG et JPEG sont autorisés.</p>'."\n";
        die();
    }

    // Generate a new name for the uploaded image
    $nouvelleImage = date("Y_m_d_H_i_s")."---".$_FILES["photo"]["name"];

    // Save the uploaded file to the server
    if(is_uploaded_file($_FILES["photo"]["tmp_name"])) {
        if(!move_uploaded_file($_FILES["photo"]["tmp_name"], "../images/uploads/".$nouvelleImage)) {
            echo '<p>Problème avec la sauvegarde de l\'image, désolé...</p>'."\n";
            die();
        }
    } else {
        echo '<p>Problème : image non chargée...</p>'."\n";
        die();
    }
} else {
    $nouvelleImage = "";
}

$req = 'INSERT INTO guide(guide_nom, guide_prenom, guide_age, guide_nation, guide_photo) 
        VALUES("'.$nom.'","'.$prenom.'", "'.$age.'", "'.$nation.'", "'.$nouvelleImage.'")';
$resultat = $mabd->query($req);
?>

</tbody>
</table>
</body>
</html>