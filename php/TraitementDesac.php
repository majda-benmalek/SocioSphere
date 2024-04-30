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
    <?php
    include_once('reglage.php');
    include_once('database.php');

    $mdpPost=$_POST['passwd'];

    $mailSession = $_SESSION['mail'];
    $pseudoSession = $_SESSION['pseudo'];
    $req = "SELECT * FROM user WHERE mail='$mailSession' ";
    $res = mysqli_query($connex, $req);
    if (!$res) {
        echo mysqli_error($connex);
        echo 'erreur';
    }
    //recupere le mot de passe 
    $row = mysqli_fetch_array($res);
    $rep = $_POST['select'];
    if (password_verify($mdpPost, $row[6]) && $rep == 'oui') {
        //on verifie que le mail existe 
        //le compte existe on supprime donc tout 
        $req100 = "DELETE FROM user WHERE mail='$mailSession' ";
        $res100 = mysqli_query($connex, $req100);
        if (!$res100) {
            echo mysqli_error($connex);
            echo 'erreur';
        }

        $req200 = "DELETE FROM mdpo WHERE pseudo='$pseudoSession' ";
        $res200 = mysqli_query($connex, $req200);
        if (!$res200) {
            echo mysqli_error($connex);
            echo 'erreur';
        }

        $req300 = "DELETE FROM publications WHERE pseudo='$pseudoSession' ";
        $res300 = mysqli_query($connex, $req300);
        if (!$res300) {
            echo mysqli_error($connex);
            echo 'erreur';
        }

        session_destroy();
        mysqli_close($connex);
    ?>
        <?php
        header('Location:inscription.php');
    } else {
        if (!(password_verify($mdpPost, $row[3]))) {
        ?>
            <div class="trait"> Mauvais mot de passe. </div>
        <?php
            include('desactivation.php');
        } else if ($rep == 'non') {
        ?>
            <div class="trait2"> Cliquez sur oui si vous souhaitez desactivé votre compte. </div>
    <?php
            include('desactivation.php');
        }
    }
    ?>
</body>

</html>