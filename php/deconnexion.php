<?php 
 include('isConnected.php'); 
require('database.php');
session_start();
//pour se deconnecter on detruit la session en cours on se deconnecte de la base de données et on redirige vers la page de connexion 
session_destroy();
mysqli_close($connex);

header('Location:connexion.php');

exit;
