<?php session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<?php include('isConnected.php'); ?>
<head>
  <meta charset="UTF-8">
  <!--
  Verifier si l'utilisateur est connecté
-->
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
  include_once('BarreVer.php');

  $mail = $_SESSION['mail'];
  $req = "SELECT * FROM user WHERE mail ='$mail'";
  $resultat = mysqli_query($connex, $req);
  if (!$resultat) {
    echo mysqli_error($connex);
  }
  $ligne = mysqli_fetch_assoc($resultat);
  $pseudo = $ligne["pseudo"];

  $req2 = "SELECT COUNT(*) FROM gestion_abo WHERE abonnements='$pseudo'";
  $res2 = mysqli_query($connex, $req2);
  if (!$res2) {
    echo mysqli_error($connex);
    echo 'erreur';
  }
  $abonne = mysqli_fetch_array($res2);

  $req3 = "SELECT COUNT(*) FROM gestion_abo WHERE abonnes='$pseudo'";
  $res3 = mysqli_query($connex, $req3);
  if (!$res3) {
    echo mysqli_error($connex);
    //echo "RES3";
  }
  $abonnement = mysqli_fetch_array($res3);
  ?>

  <div class="profil-info">
    <div class="PDP">
      <?php
      $req100 = "SELECT * FROM user where pseudo='$pseudo' ;";
      $res100 = mysqli_query($connex, $req100);
      $chemin = mysqli_fetch_assoc($res100)['PDP'];
      echo "<img src=\"$chemin\" >";
      ?>
    </div>
    <div class="info">
      <h3><?php echo htmlspecialchars($pseudo); ?></h3>
      <div class="Class-stats1">
        <p class="stats"><?php echo $abonne[0]; ?></p>
        <p class="couleur">Abonnés</p>
      </div>
      <div class="Class-stats2">
        <p class="stats"><?php echo $abonnement[0]; ?></p>
        <p class="couleur">Abonnements</p>
      </div>
    </div>

    <div class="publier">
      <a href="#demo" class="p">Publier du contenu</a>
      <div id="demo" class="modal">
        <div class="modal_content">
          <form action="Publier.php" method="post" enctype="multipart/form-data">
            <input type="file" name="file" id="file" required /><br />
            <span> Titre: </span>
            <br>
            <input type="text" name="titre" placeholder="Titre de la publication" required>
            <br>
            <input type="submit" name="submit" value="Envoyer" class="btnEnvoie" />
          </form>
          <a href="#" class="modal_close">&times;</a>
        </div>
      </div>
    </div>
  </div>



  <div class="fil">

    <div class="publication">
      <?php
      $rq = "SELECT * FROM publications WHERE pseudo = '$pseudo';";
      $rs = mysqli_query($connex, $rq);
      $chemin_image = mysqli_fetch_assoc($rs)["chemin"];
      $rqT = "SELECT * FROM publications WHERE pseudo = '$pseudo';";
      $rsT = mysqli_query($connex, $rqT);
      $titre = mysqli_fetch_assoc($rsT)["titre"];
      while ($chemin_image) {
        echo '<div class="image"> ';
        echo "<img src=\"$chemin_image\"  >";
        echo '<div class="titre">' . $titre . '</div>';

        echo '</div>';
        echo '<br>';
        echo '<br>';
        $titre = mysqli_fetch_assoc($rsT)["titre"];
        $chemin_image = mysqli_fetch_assoc($rs)["chemin"];
      }
      ?>
    </div>
  </div>

</body>

</html>