<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/pseudo.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;500&display=swap" rel="stylesheet">
    <title>
        Changement de pseudo
    </title>
</head>

<body>
    <?php
    include_once('database.php');
    include_once('reglage.php');
    $mailSession = $_SESSION['mail'];
    $nvpseudo = $_POST['nvpseudo'];
    $mdpPost=$_POST['passwd'];
    $req = "SELECT * FROM user WHERE mail='$mailSession' ";
    $res = mysqli_query($connex, $req);
    if (!$res) {
        echo mysqli_error($connex);
        echo 'erreur';
    }
    $ligne = mysqli_fetch_array($res);

    if (password_verify($mdpPost, $ligne[6])) {
        //le mot de passe correspond alors on change le pseudo 
        //on verifie que le nouveau psuedo n'existe pas deja 
        $req2 = "SELECT pseudo FROM user WHERE pseudo='$nvpseudo' ";
        $res2 = mysqli_query($connex, $req2);
        if (!$res2) {
            echo mysqli_error($connex);
            echo 'erreur2';
        }
        // $row = mysqli_fetch_array($res2);
        if ($res2->num_rows == 0) { //si le pseudo entré n'existe pas
            $nvpseudosql = mysqli_real_escape_string($connex, $nvpseudo);
            $req3 = "UPDATE user SET pseudo='$nvpseudosql' WHERE mail='$mailSession' ";
            $res3 = mysqli_query($connex, $req3);
            if (!$res3) {
                echo mysqli_error($connex);
                echo 'erreur3';
            }
            $pseudoSession = $_SESSION['pseudo'];
            $req4 = "UPDATE mdpo SET pseudo='$nvpseudosql' WHERE pseudo='$pseudoSession' ";
            $res4 = mysqli_query($connex, $req4);
            if (!$res4) {
                echo mysqli_error($connex);
                echo 'erreur';
            }
            $_SESSION['pseudo'] = $nvpseudo;
    ?>
            <div class="trait1"> Pseudo changé avec succées. </div>
        <?php
        } else {
        ?>
            <div class="trait3"> Le pseudo est deja utilisé. </div>
        <?php
            include_once('pseudo.php');
        }
    } else {
        ?>
        <div class="trait3"> Mauvais mot de passe. </div>
    <?php
        include_once('pseudo.php');
    }
    ?>
</body>

</html>