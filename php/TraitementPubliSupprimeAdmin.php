<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/SuppPublications.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;500&display=swap" rel="stylesheet">
    <title>
        Supprimer publication
    </title>
</head>

<body>
    <?php
    include('database.php');
    include('reglage.php');
    $titre = htmlspecialchars($_POST["titre"]);
    $req200 = "SELECT * FROM publications WHERE titre='$titre' ";
    $res200 = mysqli_query($connex, $req200);
    $rep200 = mysqli_fetch_assoc($res200)["titre"];

    if ($rep200 != null) {
        $pseudo = $_SESSION['pseudo'];
        $suppr = "DELETE FROM publications WHERE titre='$rep200' AND pseudo='$pseudo' ";
        $aa = mysqli_query($connex, $suppr);
        if ($aa) {
    ?>
            <div class="trait1"> Publication supprimé avec succées. </div>
        <?php
        }
    } else {
        ?>
        <div class="trait3"> Cette publication n'existe pas. </div>
    <?php
        include('SupprimerPublications.php');
    }
    ?>
</body>

</html>