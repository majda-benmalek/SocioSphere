<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<!--
PROFIL d'une autre personne
-->
<?php include('isConnected.php'); ?>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/Sprofil.css">
    <title>Profil</title>
</head>

<body>
    <?php
    include('database.php');
    include_once('BarreVer.php');

    $pseudo = $_SESSION['pseudobis'];
    $req = "SELECT * FROM user WHERE pseudo ='$pseudo'";
    $res = mysqli_query($connex, $req);
    if (!$res) {
        echo mysqli_error($connex);
        echo 'erreur';
    }
    $ligne = mysqli_fetch_assoc($res);

    $req2 = "SELECT COUNT(*) FROM gestion_abo WHERE abonnements='$pseudo'";
    $res2=mysqli_query($connex,$req2);
    if(!$res2){
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
                <p class="stats"><?php echo $abonne[0];?></p>
                <p class="couleur">Abonnés</p>
            </div>
            <div class="Class-stats2">
                <p class="stats"><?php echo $abonnement[0]; ?></p>
                <p class="couleur">Abonnements</p>
            </div>
        </div>
    </div>
    <!--<button class="suivre"><a href="suivre.php">S'abonner</a></button>-->
    <?php
    $_SESSION["pseudobis"] = $pseudo;
    $psco = $_SESSION["pseudo"];
    $est = "SELECT * FROM gestion_abo WHERE abonnes='$psco' AND abonnements='$pseudo'";
    $execute = mysqli_query($connex, $est);
    if ($execute->num_rows == 0) {
        echo '<button><a href="suivre.php">S\'abonner</a></button>';
    } else {
        echo '<button><a href="unfollow.php">Se désabonner </a></button>';
    }

    ?>
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