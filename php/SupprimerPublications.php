<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/SuppPublications.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;500&display=swap" rel="stylesheet">
    <title>
        Supprimer publication
    </title>
</head>

<body>
    <?php
    include_once('database.php');
    include_once('reglage.php');

    $pseudoSession = $_SESSION['pseudo'];
    $req = "SELECT * FROM user WHERE pseudo='$pseudoSession'";
    $res = mysqli_query($connex, $req);
    if (!$res) {
        echo mysqli_error($connex);
        echo 'erreur';
    }
    $row = mysqli_fetch_assoc($res)["admin"];
    if ($row == 1) {
    ?>
        <div class="form">
            <div class="text"> Supprimer une publication. </div>
            <div class="expli"><em>Vous etes un administateur, vous pouves supprimer une publications d'un utilisateur. Pour cela veuillez entrer le titre de la publication a supprimer.</em></div>
            <form action="TraitementPubliSupprimeAdmin.php" method="post" enctype="multipart/form-data">
                <label for="pseudo">Entrez le pseudo de l'utilisateur concerné: </label>
                <input type="text" name="pseudo" placeholder="Entrez un pseudo" /><br>
                <label for="file">Titre de la publication:</label>
                <input type="text" name="titre" placeholder="Entrez un titre" /><br>
                <input type="submit" name="suivant" value="Supprimer" class="btnSuiv">
            </form>
        </div>
    <?php
    } else {
    ?>
        <div class="form">
            <div class="text"> Supprimer une publication. </div>
            <div class="expli"><em>Veuillez entrer le titre de la publication a supprimer.</em></div>
            <form action="TraitementPubliSupprime.php" method="post" enctype="multipart/form-data">
                <label for="file">Titre de la publication:</label>
                <input type="text" name="titre" placeholder="Entrez le titre" /><br>
                <input type="submit" name="suivant" value="Supprimer" class="btnSuiv">
            </form>
        </div>
    <?php
    }
    ?>
</body>

</html>