<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/inscription.php">
    <title>
        Traitement Inscription
    </title>
</head>

<body>
    <?php
    include_once('database.php');
    $mailPost = $_POST['mail'];
    $mdpPost = $_POST['passwd'];
    $mdpconf = $_POST['confPasswd'];
    $pseudoPost = $_POST['pseudo'];
    $birthdayPost = $_POST['birthday'];


    $mailhtml = htmlspecialchars($mailPost);
    $prenomhtml = htmlspecialchars($prenomPost);
    $birthdayhtml = htmlspecialchars($birthdayPost);
    $mdpEnco = password_hash($mdpPost, PASSWORD_DEFAULT);

    $mail = mysqli_real_escape_string($connex, $mailhtml);
    $birthday = mysqli_real_escape_string($connex, $birthdayhtml);
    $pseudo = mysqli_real_escape_string($connex, $pseudohtml);
    $mdp = mysqli_real_escape_string($connex, $mdpEnco);
    //on rentre dans la base et on cherche si la personne existe et si les personnes ont le meme pseudo 

    $req = "SELECT * FROM user WHERE mail='$mailPost' ";
    $res = mysqli_query($connex, $req);
    if (!$res) { //on verifie que les requetes se font bien 
        echo mysqli_error($connex);
        echo "Erreur";
    }
    $req100 = "SELECT pseudo FROM user WHERE pseudo='$pseudoPost' ";
    $res100 = mysqli_query($connex, $req100);
    if (!$res100) {
        echo mysqli_error($connex);
        echo "Erreur1";
    }
    if ($res->num_rows != 0) { //|| $res100->num_rows != 0) {
        //elle est deja inscrite et on affiche la page de connexion 
    ?>
        <div class="trait"> Vous etes deja inscrit. Connectez vous! </div>
    <?php
        include_once('connexion.php');
    } else if ($res100->num_rows != 0) { // || $res100) {
        //le pseudo existe deja 
    ?>
        <div class="trait5"> Ce pseudo a deja été utilisé. </div>
        <?php
        include_once('inscription.php');
    } else {
        //pas inscrite  
        //on verifie l'age de la personne 
        $aujourdhui = date("Y-m-d");
        $diff = date_diff(date_create($birthdayPost), date_create($aujourdhui));
        if ($diff->format('%y') > 15) {
            //+ 15 ans  
            if ($mdpconf == $mdpPost) {
                $req200 = "INSERT INTO user VALUES (0,0,'$pseudo','$mail','null','$birthday','$mdp') ";
                $res200 = mysqli_query($connex, $req200);
                if (!$res200) {
                    echo mysqli_error($connex);
                    echo 'erreur';
                }
                $req300 = "INSERT INTO mdpo VALUES('$pseudo','null','null')";
                $res300 = mysqli_query($connex, $req300);
                if (!$res300) {
                    echo mysqli_error($connex);
                    echo 'erreur';
                }

                $_SESSION['mail'] = $mailhtml;
                $_SESSION['birthday'] = $birthdayhtml;
                $_SESSION['pseudo'] = $pseudohtml;
                header('Location:question.php');
            } else {
        ?>
        <div class="trait">Les deux mots de passes ne correspondent pas. </div>
            <?php
            include_once('inscription.php');
            }
        } else {
            //sinon la personne est trop jeune et se voit refuser l'accees au site 
            ?>
            <div class="trait">Vous êtes trop jeune pour vous inscrire. </div>
    <?php
            include_once('inscription.php');
        }
    }
    ?>
</body>

</html>