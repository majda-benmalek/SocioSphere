<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/mdp.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;500&display=swap" rel="stylesheet">
    <title>
        Mot de passe oublié
    </title>
</head>
<body>
<body>
    <div class="form">
        <div class="text"> Mot de passe oublié. </div>
        <br>
        <div class="text1"><em>Veuillez entrer votre pseudo. </em></div>
        <br>
        <div class="form-saisie">
            <form action="TraitementMdp.php" method="post">
                <span> Votre pseudo: </span> <input type="text" name="pseudo" placeholder="Votre pseudo" required>
                <input type="submit" name="suivant" value="Suivant" class="btnSuivant">
            </form>
        </div>
    </div>
</body>
</html>