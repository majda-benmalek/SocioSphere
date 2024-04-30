<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/mail.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;500&display=swap" rel="stylesheet">
    <title>
        Traitement changement de mail
    </title>
</head>

<body>
    <?php
    include('database.php');
    include('reglage.php');
    $mdpPost=$_POST['passwd'];
    $mailSession = $_SESSION['mail'];
    $nvmail = $_POST['nvmail'];
    $req = "SELECT * FROM user WHERE mail='$mailSession'";
    $res = mysqli_query($connex, $req);
    if (!$res) {
        echo mysqli_error($connex);
        echo 'erreur';
    }
    $ligne = mysqli_fetch_array($res);

    //on verifie le mdp  
    if (password_verify($mdpPost, $ligne[6])) {
        $req100 = "SELECT * FROM user WHERE mail='$nvmail'";
        $res100 = mysqli_query($connex, $req100);
        if (!$res100) {
            echo mysqli_error($connex);
            echo 'erreur1';
        }
        $ligne100 = mysqli_fetch_array($res100);
        if ($res100->num_rows == 0) {
            $req200 = "UPDATE user SET mail='$nvmail' WHERE mail='$mailSession' ";
            $res200 = mysqli_query($connex, $req200);
            if (!$res200) {
                echo mysqli_error($connex);
                echo 'erreur2';
            }
    ?>
            <div class="trait1"> E-mail changé avec succées. </div>
        <?php
        } else {
        ?>
            <div class="trait3"> E-mail deja utilisé. </div>
        <?php
            include('mail.php');
        }
    } else {
        ?>
        <div class="trait3"> Mauvais mot de passe. </div>
    <?php
        include('mail.php');
    }

    ?>
</body>

</html>