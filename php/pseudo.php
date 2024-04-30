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
    <?php include_once('reglage.php'); ?>
    <div class="form">
        <div class="text"> Changement de pseudo. </div>
        <!--si le mot de passe ne correspond pas impossible de changer de pseudo et on verifie que ce pseudo n'existe pas deja dans la bas de données pour pouvoir le changer  -->
        <form action="TraitementPseudo.php" method="post">
            <span> Votre mot de passe: </span> <input type="password" name="passwd" placeholder="Votre mot de passe" minlength="8" required>
            <br>
            <span> Votre nouveau pseudo: </span> <input type="text" name="nvpseudo" placeholder="Nouveau pseudo" required>
            <br>
            <input type="submit" name="suivant" value="Changer" class="btnSuiv">
            <br>
            En cas de mot de passe oublié <a href="mdpOublie.php"> Cliquez ici! </a>
        </form>
    </div>

</body>

</html>