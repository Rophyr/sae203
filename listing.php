<!DOCTYPE html>
<html>
<head>
  <title>Sae203</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tilt+Warp&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>

<?php include('header.php'); 
$mabd = new PDO('mysql:host=localhost;dbname=sae203base;charset=UTF8;', 'root', 'root');
$mabd->query('SET NAMES utf8;');
$req = "SELECT d.*, g.guide_nom, g.guide_prenom, g.guide_photo
FROM destinations d
LEFT JOIN guide g ON d._guide_id = g.guide_id
";
$resultat = $mabd->query($req);
?>

<section class="first">
<div class="container" style="display: flex; flex-direction: row; align-items: center; flex-wrap: wrap; border: 2px solid transparent; text-align: center; justify-content: center; margin-top: 40px;">
    <?php foreach ($resultat as $value) : ?>
        <div class="container" style="display: flex; flex-direction: column; align-items: center; flex-wrap: wrap; margin: 20px;">
            <div class="image1">
                <img src="/images/uploads/<?php echo $value["guide_photo"]; ?>" alt="photoguide" width="300" height="300">
            </div>
            <div class="text" style="width: 300px;">
                <figcaption><?php echo $value['dest_pays']; ?></figcaption>
                <p style="width: 300px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">Ville: <?php echo $value['dest_nom']; ?></p>
                <p style="width: 300px;">Guide: <?php echo $value['guide_nom']; ?></p>
                <p style="width: 300px;"><?php echo $value['guide_prenom']; ?></p>
                <p style="width: 300px;">Budget: <?php echo $value['dest_budget']; ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>

</section>

<?php include('footer.php'); ?>

</body>
</html>
