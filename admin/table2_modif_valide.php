<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<a href="table2_gestion.php">Retour</a> 	
	<hr>
	<h1>Gestion des guides</h1>
	<p>Modification d'un guide reussi !</p>
	<hr>

	<?php
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $age=$_POST['age'];
    $nation=$_POST['nation'];
    $num =$_POST['num'];

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

        $req = 'UPDATE guide SET guide_nom="'.$nom.'", guide_prenom="'.$prenom.'", guide_age='.$age.', guide_nation=(SELECT nation_nom FROM nation WHERE nation_id="'.$nation.'"), guide_photo="'.$nouvelleImage.'" WHERE guide_id='.$num;

    }
    else{
        $req = 'UPDATE guide SET guide_nom="'.$nom.'", guide_prenom="'.$prenom.'", guide_age='.$age.', guide_nation=(SELECT nation_nom FROM nation WHERE nation_id="'.$nation.'") WHERE guide_id='.$num;
    }
    echo 'juste pour le debug: '.$req;
    $resultat = $mabd->query($req);
    ?>
	</tbody>
	</table>
</body>
</html>