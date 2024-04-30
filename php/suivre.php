<?php
session_start();
include_once('database.php');
$abo = $_SESSION["pseudo"];
$abonnement = $_SESSION["pseudobis"];

$req = "INSERT INTO gestion_abo VALUES('$abo','$abonnement',0)";
$res = mysqli_query($connex, $req);
if ($res) {
    echo "ok";
} else {
    echo mysqli_error($connex);
    echo 'erreur';
}
header('Location:profilBiss.php?a=' . urlencode($abonnement));
