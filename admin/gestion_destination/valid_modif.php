<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<a href="gestion_dest.php">Retour</a> 	
	<hr>
	<h1>gestion des guides</h1>
	<p>Modification d'un guide reussi !</p>
	<hr>

	<?php
    $ville=$_POST['ville'];
    $pays=$_POST['pays'];
    $budget=$_POST['budget'];
    $pays=$_POST['pays'];
    $num=$_POST['num'];

    $mabd = new PDO('mysql:host=localhost;dbname=sae203base;charset=UTF8;', 'mmi22c11', 'L8Fi8>(2N_xi');
    $mabd->query('SET NAMES utf8;');

    $imageName=$_FILES["photo"]["name"];
    if($imageName!=""){
        $imageType=$_FILES["photo"]["type"];
        if (($imageType != "image/png") && ($imageType != "image/jpg") && ($imageType != "image/jpeg")) {
            echo '<p>Désolé, le type d\'image n\'est pas reconnu !';
            echo 'Seuls les formats PNG et JPEG sont autorisés.</p>'."\n";
            die();
        }

        $nouvelleImage = date("Y_m_d_H_i_s")."---".$_FILES["photo"]["name"];

        if (is_uploaded_file($_FILES["photo"]["tmp_name"])) {
            if (!move_uploaded_file($_FILES["photo"]["tmp_name"], "../images/uploads/".$nouvelleImage)) {
                echo '<p>Problème avec la sauvegarde de l\'image, désolé...</p>'."\n";
                die();
            }
        } else {
            echo '<p>Problème : image non chargée...</p>'."\n";
            die();
        }

        $req = 'UPDATE destinations SET dest_nom="'.$ville.'", dest_pays="'.$pays.'", dest_budget="'.$budget.'", dest_pays=(SELECT nation_nom FROM nation WHERE nation_id="'.$pays.'"), dest_photo="'.$nouvelleImage.'" WHERE dest_id='.$num;

    }
    else{
        $req = 'UPDATE destinations SET dest_nom="'.$ville.'", dest_pays="'.$pays.'", dest_budget="'.$budget.'", dest_pays=(SELECT nation_nom FROM nation WHERE nation_id="'.$pays.'") WHERE dest_id='.$num;
    }
    echo 'juste pour le debug: '.$req;
    $resultat = $mabd->query($req);
    ?>
	</tbody>
	</table>
</body>
</html>