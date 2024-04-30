<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/connexion.css">
    <title>
        Traitement connexion
    </title>
</head>

<body>
    <?php
    require('database.php');

    $mailPost = $_POST['mail'];
    $mdpPost = $_POST['passwd'];
    //recuperer le mdp et le mail

    $req = "SELECT * FROM user WHERE mail='$mailPost' ";
    $res = mysqli_query($connex, $req);

    if (!$res) {
        echo mysqli_error($connex);
        echo "Erreur1";
    }
    //on recupere le resultat de la requete dans un tableau 
    $row = mysqli_fetch_row($res);

    if ($row[3] != $mailPost) {
        //l'email existe pas 
    ?>
        <div class="trait"> Cet e-mail n'existe pas. Veuillez vous inscrire.</div>
        <?php
        include_once('connexion.php');
        //on laisse un mot et on remet sur la page de connexion (on sait jamais si juste la personne fait une erreur de frappe flemme de le mettre sur la pade d'inscription )
    } else {
        if (password_verify($mdpPost, $row[6])) {
            //on verifie le mot de passe 
            $_SESSION['mail'] = $mailPost;
            $_SESSION['pseudo'] = $row[2];
            header('Location:profil.php');
        } else {
        ?>
            <div class="trait">Mot de passe incorrect. </div>
    <?php
            //on laisse un mot et on remet la page de connexion
            include_once('connexion.php');
        }
    }
    ?>
</body>

</html>