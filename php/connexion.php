<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/connexion.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;500&display=swap" rel="stylesheet">
    <title>
        Connexion
    </title>
</head>

<body>
    <div class="FormConn">
        <div class="form-text"> Connexion</div>
        <div class="form-saisie">
            <form action="TraitementConnexion.php" method="post">
                <span>Email:</span><input type="email" name="mail" placeholder="Votre email" required>
                <br>
                <span>Mot de passe:</span><input type="password" name="passwd" placeholder="Votre mot de passe" required>
                <br>
                <br>
                <input type="submit" name="Connexion" value="Connexion" class="btnConnexion">
                <br>
                <div class="lien">
                    Mot de passe oublié? <a href="mdpOublie.php">Changez le ici!</a>
                    <br>
                    Pas inscrit? <a href="inscription.php">Inscrivez vous ici!</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>