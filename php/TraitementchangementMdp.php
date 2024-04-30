<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<?php include('isConnected.php'); ?>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/changementMdp.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;500&display=swap" rel="stylesheet">
    <title>
        Traitement Changement mot de passe
    </title>
</head>

<body>
    <?php
    include('database.php');

    $pass = $_POST['mdp'];
    $conf = $_POST['mdp2'];
    $pseudoSession = $_SESSION['pseudo'];
    $req = "SELECT * FROM mdpo WHERE pseudo='$pseudoSession' ";
    $res = mysqli_query($connex, $req);
    if (!$res) {
        echo mysqli_error($connex);
        echo 'erreur';
    }
    $row = mysqli_fetch_row($res);
    //faire attention au espace
    if ($row[2] == $_POST['reponse']) {
        if ($pass == $conf) {
            $mdphash = password_hash($pass, PASSWORD_DEFAULT);
            $reqq = "UPDATE user SET mdp='$mdphash' WHERE pseudo='$pseudoSession' ";
            $ress = mysqli_query($connex, $reqq);
            if (!$ress) {
                echo mysqli_error($connex);
                echo 'erreur';
            }
    ?>
            <div class="trait1"> Mot de passe changé avec succées. </div>
            <form action="connexion.php" class="retour">
                <input type="submit" name="retour" value="Retour a la connexion." class="btnRetour"> 
            </form>
        <?php
        } else {
        ?>
            <div class="trait1">Les deux mots de passe ne sont pas les memes. </div>
            <div class="form">
                <form action="TraitementchangementMdp.php" method="post">
                    <span> <u> Votre question :</u></span> <?php echo $row[1]; ?> <input type="text" name="reponse" placeholder="Votre reponse" required>
                    <br>
                    <span>Nouveau mot de passe :</span> <input type="password" name="mdp" placeholder="Nouveau mot de passe" minlength="8" required>
                    <br>
                    <br>
                    <span>Confirmation du nouveau mot de passe :</span><input type="password" name="mdp2" placeholder="Confirmation" minlength="8" required>
                    <br>
                    <br>
                    <input type="submit" name="suivant" value="suivant" class="btnSuivant">
                </form>
            </div>
        <?php
        }
    } else {
        ?>
        <div class="trait1"> Mauvaise reponse. </div>
        <div class="form">
            <form action="TraitementchangementMdp.php" method="post">
                <span> <u> Votre question :</u></span> <?php echo $row[1]; ?> <input type="text" name="reponse" placeholder="Votre reponse" required>
                <br>
                <span>Nouveau mot de passe :</span> <input type="password" name="mdp" placeholder="Nouveau mot de passe" minlength="8" required>
                <br>
                <br>
                <span>Confirmation du nouveau mot de passe :</span><input type="password" name="mdp2" placeholder="Confirmation" minlength="8" required>
                <br>
                <br>
                <input type="submit" name="suivant" value="suivant" class="btnSuivant">
            </form>
        </div>
    <?php

    }
    ?>
</body>

</html>