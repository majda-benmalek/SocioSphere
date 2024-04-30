<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/desactivation.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;500&display=swap" rel="stylesheet">
    <title>
        Réglage
    </title>
</head>

<body>
    <?php include_once('reglage.php'); ?>
    <div class="form">
        <div class="text">Veuillez entrer votre mot de passe pour verifier votre identité.</div>
        <form action="TraitementDesac.php" method="post">
            <span> Votre mot de passe : </span> <input type="password" name="passwd" placeholder="Votre mot de passe " minlength="8" required>
            <br>
            <span>Etes vous sur de votre choix? </span>
            <br>
            <br>
            <div class="wrapper">
                <input type="radio" name="select" id="yes" value="oui" checked>
                <input type="radio" name="select" id="no" value="non">
                <label for="yes" class="option optionyes">
                    <div class="dot"></div>
                    <span>Oui</span>
                </label>
                <label for="no" class="option optionno">
                    <div class="dot"></div>
                    <span>Non</span>
                </label>
            </div>
            <br>
            <br>
            <input type="submit" name="desactiver" value="Désactiver" class="btnDesac">
        </form>
    </div>

</body>

</html>