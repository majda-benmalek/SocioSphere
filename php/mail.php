<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/mail.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;500&display=swap" rel="stylesheet">
    <title>
        Changement de e-mail
    </title>
</head>

<body>
    <?php include('reglage.php'); ?>
    <!--si le mot de passe ne correspond pas impossible de changer de pseudo et on verifie que ce pseudo n'existe pas deja dans la bas de données pour pouvoir le changer  -->
    <div class="form"> 
        <div class="text"> Changement d'email. </div>
        <form action="TraitementMail.php" method="post">
            <span> Votre mot de passe: </span> <input type="password" name="passwd" placeholder="Votre mot de passe" minlength="8" required>
            <br>
            <span> Votre nouveau e-mail: </span> <input type="email" name="nvmail" placeholder="Nouveau e-mail" required>
            <br>
            <input type="submit" name="suivant" value="Changer" class="btnSuiv">
            <br>
            En cas de mot de passe oublié <a href="mdpOublie.php"> Cliquez ici! </a>
        </form>
    </div>

</body>

</html>