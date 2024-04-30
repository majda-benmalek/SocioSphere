<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<?php include('isConnected.php'); ?>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/recherche.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/33e89b7379.js" crossorigin="anonymous"></script>
    <title>
        Traitement recherche
    </title>
</head>
<?php
session_start();
$ps = htmlspecialchars($_POST["pseudo"]);
include('database.php');
$req100 = "SELECT * FROM user WHERE pseudo='$ps'";
$res100 = mysqli_query($connex, $req100);
$reponse = mysqli_fetch_assoc($res100)["pseudo"];

if ($reponse != null) {
        $_SESSION['pseudobis'] = $reponse;
        header("Location:profilBiss.php");
} else {
    header('Location:fil.php');
}

