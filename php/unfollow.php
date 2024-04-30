<?php
session_start();
include_once('database.php');
$abo = $_SESSION["pseudo"];
$abonnement = $_SESSION["pseudobis"];
$req = "DELETE FROM gestion_abo WHERE abonnes='$abo' AND abonnements='$abonnement'";
$res = mysqli_query($connex, $req);
if ($res) {
    echo "ok";
} else {
    echo mysqli_error($connex);
    echo 'erreur';
}
header("Location:profilBiss.php?a=$abonnement");
