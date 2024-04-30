<?php session_start();  ?>
<!DOCTYPE html>
<html lang="fr">
<?php include('isConnected.php'); ?>

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../css/Sprofil.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;500&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/33e89b7379.js" crossorigin="anonymous"></script>
  <title>Profil</title>
</head>

<body>
  <?php
  include('database.php');
  $titrehtml = htmlentities($_POST['titre']);
  $titre = mysqli_real_escape_string($connex, $titrehtml);
  $imageType = strtolower(pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION));
  $emplac = "../image/" . $_FILES["file"]["name"];
  $emplachtml = htmlentities($emplac);
  $emplacsql = mysqli_real_escape_string($connex, $emplachtml);
  move_uploaded_file($_FILES["file"]["tmp_name"], $emplac);
  $pseudoSession = $_SESSION['pseudo'];
  $ajout = "INSERT INTO publications VALUES (0,'$pseudoSession', '$emplacsql', '$imageType', '$titre') ";
  $r = mysqli_query($connex, $ajout);
  if (!$r) {
    echo mysqli_error($connex);
  }
  header("Location:profil.php");
  ?>
</body>

</html>