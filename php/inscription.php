<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/inscription.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;500&display=swap" rel="stylesheet">
    <title>
        inscription
    </title>
</head>

<body>
    <div class="FormInsc">
        <div class="form-text"> Inscription </div>
        <div class="form-saisie">
            <form action="TraitementInscription.php" method="post">
                <span>Email:</span> <input type="email" name="mail" placeholder="Votre adresse mail" required>
                <br>
                <span>Date de naissance:</span> <input type="date" name="birthday" placeholder="Votre date de naissance " required>
                <br>
                <span>Pseudo:</span> <input type="text" name="pseudo" placeholder="Votre psuedo" required>
                <br>
                <span>Mot de passe: <small><small>(min 8 caracteres)</small></small></span> <input type="password" name="passwd" minlength="8" placeholder="Votre mot de passe" required>
                <br>
                <span>Confirmation de votre mot de passe :</span> <input type="password" name="confPasswd" minlength="8" placeholder="Confirmation" required>
                <br>
                <br>
                <input type="submit" name="inscription" value="Inscription" class="btnInscris">
                <br>
                <div class="lien">Vous etes deja inscrit?&nbsp; <a href="connexion.php"> Connectez vous! </a></div>
            </form>
        </div>
    </div>
</body>

</html>