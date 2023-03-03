<?php
    if ( (empty($_POST['search'])) ) {
        header('Location: form_recherche.php');
    }
    $search = $_POST['search'];
    if($search==null) {
        header('Location: form_recherche.php?erreur=1');
    }
    $search_nettoye =  filter_var( $search , FILTER_SANITIZE_STRING );
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

<h1 class="centre">Resultat de la Recherche : </h1>

<?php
   echo '<p class="centre blanc">'.$search_nettoye.'</p>'."\n";
?>

<section class="first">
<div class="container">
  <ul>
  <li class="guide">
      <figure>
        <img src="images/DALL·E 2023-03-01 16.40.04 - a man from france, upper body, photo(1).png" alt="Man from France">
      </figure>
      <div class="info">
        <p class="pays">France</p>
        <h1>Antoine Dubois</h1> 
      </div>
    </li>
    <li class="guide">
      <figure>
        <img src="images/DALL·E 2023-03-01 16.32.18 - a man from bangladesh, upper body, photo.png" alt="Man from Bangladesh">
      </figure>
      <div class="info">
        <p class="pays">Bangladesh</p>
        <h1>Tariq Rahman</h1> 
      </div>
    </li>
  </ul>
</div>

<?php  require 'footer.php'; ?>

</body>

</html>