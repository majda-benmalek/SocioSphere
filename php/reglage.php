<!DOCTYPE html>
<html lang="fr">
<?php include('isConnected.php'); ?>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/reglage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/33e89b7379.js" crossorigin="anonymous"></script>
    <title>
        Réglage
    </title>
</head>

<body>
    <?php include_once('BarreVer.php');
    include('database.php'); ?>

    <div class="barreHor">
        <hr>
        <div class="titre"><i class="fa-solid fa-gear"></i><a href="reglage.php"> Réglages.</a></div>
        <hr>
        <br><br>
        <hr>
        <i class="fa-solid fa-key"></i><a href="password.php"> Changer de mot de passe. </a>
        <hr>
        <i class="fa-solid fa-user-astronaut"></i><a href="pseudo.php"> Changer de pseudo. </a>
        <hr>
        <i class="fa-solid fa-envelopes-bulk"></i><a href="mail.php"> Changer d'e-mail. </a>
        <hr>
        <i class="fa-solid fa-delete-left"></i><a href="desactivation.php"> Désactiver votre compte. </a>
        <hr>
        <i class="fa-solid fa-image-portrait"></i><a href="PDP.php"> Photo de profil. </a>
        <hr>
        <i class="fa-solid fa-trash-can"></i><a href="SupprimerPublications.php"> Supprimer une publication </a>
        <hr>


        <div class="Bouton">
            <form action="profil.php">
                <input type="submit" name="retour" value="Retour au profil. " class="btnRetour">
            </form>
            <br>
            <form action="deconnexion.php">
                <input type="submit" name="retour" value="Déconnexion. " class="btnRetour">
            </form>
        </div>

    </div>

</body>

</html>