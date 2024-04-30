<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/password.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;500&display=swap" rel="stylesheet">
    <title>
        Changement de mot de passe
    </title>
</head>

<body>
    <?php
    require('database.php');
    include('reglage.php');

    $mailSession = $_SESSION['mail'];
    $nvmdp = $_POST['nvpasswd'];
    $confnvmdp = $_POST['confpasswd'];
    $mdpPost=$_POST['passwd'];

    //on recupere le mdp de la base de données 
    $req = "SELECT mdp FROM user WHERE mail='$mailSession'";
    $res = mysqli_query($connex, $req);
    if (!$res) {
        echo mysqli_error($connex);
        echo 'erreur';
    }
    $ligne = mysqli_fetch_array($res);
    //si l'ancien mdp correspond au mdp deja entrée 
    if (password_verify($mdpPost, $ligne[0])) {
        if ($nvmdp == $confnvmdp) {
            $nvmdpEnco = password_hash($nvmdp, PASSWORD_DEFAULT);
            $nvmdpsql = mysqli_real_escape_string($connex, $nvmdpEnco);

            $req2 = "UPDATE user SET mdp='$nvmdpsql' WHERE mail='$mailSession' ";
            $res2 = mysqli_query($connex, $req2);
            if (!$res2) {
                echo mysqli_error($connex);
                echo 'erreur2';
            }
    ?>
            <div class="trait1">Mot de passe changé avec succés. </div>
        <?php
        } else {
        ?>
            <div class="trait3"> Les deux mot de passe ne correspondent pas. </div>
        <?php
            include_once('password.php');
        }
    } else {
        //mdp ne correspond pas
        ?>
        <div class="trait3"> L'ancien mot de passe ne correspond pas. </div>
    <?php
        include_once('password.php');
    }
    ?>
</body>

</html>