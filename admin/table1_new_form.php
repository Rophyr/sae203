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
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ville = $_POST['ville'];
    $pays = $_POST['pays'];
    $budget = $_POST['budget'];
    $note = $_POST['note'];
    $horaire = $_POST['horaire'];
    
    $mabd = new PDO('mysql:host=localhost;dbname=sae203base;charset=UTF8;', 'mmi22c11', 'L8Fi8>(2N_xi');
    $mabd->query('SET NAMES utf8;');

    $req = $mabd->prepare('INSERT INTO destinations(dest_nom, dest_pays, dest_budget, dest_note, dest_fus_hor) 
                           VALUES(:ville, :pays, :budget, :note, :horaire)');
    $req->execute(array(
        'ville' => $ville,
        'pays' => $pays,
        'budget' => $budget,
        'note' => $note,
        'horaire' => $horaire
    ));
    
    // Redirect to a confirmation page
    header('Location: destination_created.php');
    exit;
}
?>

<form method="POST" action="">
    Ville:<input type="text" name="ville"><br>
    Pays:
    <select name="pays">
    	<?php
            $mabd = new PDO('mysql:host=localhost;dbname=sae203base;charset=UTF8;', 'mmi22c11', 'L8Fi8>(2N_xi');
            $mabd->query('SET NAMES utf8;');
            $req = "SELECT * FROM  nation ";
            $resultat = $mabd->query($req);
    
            foreach ($resultat as $value) {
                echo '<option value="' .  $value['nation_nom'] . '"> ' .  $value['nation_nom'] . '</option>';
            }
         ?>
    </select>
    <br>
    Budget:<input type="text" name="budget"><br>
    Note:<input type="text" name="note"><br>
    Fuseau horaire:<input type="text" name="horaire"><br>
    <input type="submit" name="ajouter">
</form>

</body>
</html>