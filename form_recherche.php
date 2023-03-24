<!DOCTYPE html>
<html>
<head>
  <title>Recherche de guide</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tilt+Warp&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>


<body>
	
<?php include('header.php'); ?>

<main id="form">
    <div id="recherche">
        <form action="reponse_recherche.php" method="post">
            <p>
                <label for="region">Recherche</label>
                <input type="text" name="region" id="region">
            </p>
            <p>
                <input type="submit" value="Valider">
            </p>
        </form>
    </div>
</main>

<?php include('footer.php'); ?>

</body>


</html>