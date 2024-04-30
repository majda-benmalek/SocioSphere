<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/PDP.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;500&display=swap" rel="stylesheet">
    <title>
        Photo de profil.
    </title>
</head>

<body>
    <?php
    include_once('reglage.php');
    ?>
    <div class="form">
        <div class="text">Changer de photo de profil:</div>
        <br>
        <form action="TraitementPDP.php" method="post" enctype="multipart/form-data">
            <label for="file"> Votre photo de profil: </label> <input type="file" name="file" id="file" class="inputfile"> <br>
            <input type="submit" name="suivant" value="Changer" class="btnSuiv">
        </form>
    </div>
</body>

</html>