<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/question.css">
    <title>
        Traitement Question
    </title>
</head>

<body>
    <?php
    require('database.php');
    
    $pseudoPost=$_POST['pseudo'];
    //on verifie que le mail existe bien 

    $req = "SELECT * FROM mdpo WHERE pseudo='$pseudoPost'";
    $res = mysqli_query($connex, $req);

    if (!$res) {
        echo mysqli_error($connex);
        echo 'erreur';
    }
    $question=$_POST['q'];
    $reponse=$_POST['reponse'];
    $q=mysqli_real_escape_string($connex,$question);
    $r=mysqli_real_escape_string($connex,$reponse);
    if ($res->num_rows != 0) {
        $req2 = "UPDATE mdpo SET question = '$q', reponse='$r' WHERE pseudo='$pseudoPost' ";
        $res2 = mysqli_query($connex, $req2);
        
        if (!$res2) {
            echo mysqli_error(($connex));
            echo 'erreur2';
        }
        $_SESSION['question'] = $questionPost;
        //tout ce passe bien on vas au profil 
        header('Location:profil.php');
    } else {
        //sinon :
    ?>
        <div class="trait"> Ce n'est pas le bon pseudo.</div>
    <?php
        include('question.php');
    }
    ?>
</body>

</html>