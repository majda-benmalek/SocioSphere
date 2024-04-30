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
    <?php include('reglage.php'); ?>
    <div class="form">
        <div class="text">Changement de mot de passe.</div>
        <form action="TraitementPassword.php" method="post">
            <span> Votre ancien mot de passe :</span> <br> <input type="password" name="passwd" placeholder="Ancien mot de passe" minlength="8" required>
            <br>
            <span> Votre nouveau mot de passe: </span> <br> <input type="password" name="nvpasswd" placeholder="Nouveau mot de passe" minlength="8" required>
            <br>
            <span> Confirmation de votre nouveau mot de passe: </span> <br> <input type="password" name="confpasswd" placeholder="Confirmation" minlength="8" required>
            <br>
            <input type="submit" name="Suivant" value="Changer" class="btnSuiv">
            <br>
            En cas de mot de passe oublié <a href="mdpOublie.php"> Cliquez ici! </a>
            <br>
        </form>

    </div>
</body>

</html>