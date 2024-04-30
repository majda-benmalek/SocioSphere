<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/PDP.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;500&display=swap" rel="stylesheet">
    <title>
        Traitement photo de profil.
    </title>
</head>

<body>
    <?php
    include('database.php');
    include_once('reglage.php');
    $pseudoSession=$_SESSION['pseudo'];
    $imageType = strtolower(pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION));
    $emplac = "../image/" . $_FILES["file"]["name"] ;
    move_uploaded_file($_FILES["file"]["tmp_name"], $emplac);
    $req = "UPDATE user SET PDP='$emplac' WHERE pseudo='$pseudoSession' ";
    $res = mysqli_query($connex, $req);
    if (!$res) {
        echo 'erreur';
    }
    if($res){
        header('Location:profil.php');
    }else{
        echo 'ON RENCONTRE UN PROBLEME';
    }
    ?>
</body>

</html>