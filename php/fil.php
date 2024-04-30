<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php include('isConnected.php'); ?>
<head>
    <meta charset="UTF-8">
    <title>Fil d'actualité</title>
    <link rel="stylesheet" href="../css/fil.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/33e89b7379.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    include('database.php');
    include('BarreVer.php');
    ?>

    <div class="logo">
        <img src="../images/Logo.png">
    </div>
   
    <div class="publication">
        <div class="contenu">
            <?php
            $pseudo = $_SESSION['pseudo'];
            $req = "SELECT * FROM gestion_abo where abonnes='$pseudo'";
            $res = mysqli_query($connex, $req);
            $row = mysqli_fetch_assoc($res)["abonnements"];
            while ($row) {
                $req100 = "SELECT * FROM publications WHERE pseudo = '$row';";
                $res100 = mysqli_query($connex, $req100);
                $chemin = mysqli_fetch_assoc($res100)["chemin"];
                //CHANGEMENT
                $req20 = "SELECT * FROM publications WHERE pseudo = '$row';";
                $res20 = mysqli_query($connex, $req20);
                $titre = mysqli_fetch_assoc($res20)["titre"];
                while ($chemin) {
                    echo '<div class="image"> ';
                    echo "<img src=\"$chemin\">";
                    //$_SESSION["pseudobis"] = $row;
                    echo '<div class="titre">' . "<a href='profilBiss.php?a=$row'>" . $titre . "</a>" . '</div>';
                    echo '</div>';
                    echo "<br>";
                    echo "<br>";
                    $titre = mysqli_fetch_assoc($res20)["titre"];
                    $chemin = mysqli_fetch_assoc($res100)["chemin"];
                }
                echo "<br>";
                $row = mysqli_fetch_assoc($res)["abonnements"];
            }
            ?>
        </div>
    </div>
</body>

</html>