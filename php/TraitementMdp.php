<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/traitementMdp.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;500&display=swap" rel="stylesheet">
    <title>
        Traitement mot de passe oublié
    </title>

<body>
    <?php
    include('database.php');
    $pseudoPost=$_POST['pseudo'];
    $req = "SELECT * from mdpo where pseudo='$pseudoPost' ";
    $res = mysqli_query($connex, $req);
    if (!$res) {
        echo mysqli_error($connex);
        echo 'erreur';
    }
    $ligne = mysqli_fetch_array($res);
    if ($ligne[0] == $pseudoPost) {
        //on recupere la question a poser 
        $_SESSION['pseudo']=$pseudoPost;
    ?>
        <div class="form">
            <div class="text"> Veuillez entrer la reponse a votre question pour changer de mot de passe. </div>
            <form action="TraitementchangementMdp.php" method="post">
                <span> <u> Votre question :</u></span> <?php echo $ligne[1]; ?> <input type="text" name="reponse" placeholder="Votre reponse" required>
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
    } else {
    ?>
        <div class="trait1"> Ce pseudo n'existe pas. </div>
    <?php
        include('mdpOublie.php');
    }
    ?>
</body>
</head>