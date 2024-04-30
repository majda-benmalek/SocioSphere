<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/BarreVer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/33e89b7379.js" crossorigin="anonymous"></script>
    <title>
        Barre Vertical
    </title>
</head>

<body>
    <div class="barreVer">
        <div class="Fil">
            <i class="fa-solid fa-newspaper"></i> <a href="fil.php"> Fil </a>
        </div>
        <div class="Profil">
            <i class="fa-solid fa-address-card"></i><a href="profil.php"> Profil </a>
        </div>
        <div class="Chercher">
            <form action="TraitementRecherche.php" method=post>
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="search" name="pseudo" placeholder="Recherche..."><input type="submit" name="m" value="m">
            </form>
        </div>
        <div class="Reglages">
            <i class="fa-solid fa-user-gear"></i><a href="reglage.php"> Réglages</a>
        </div>
        <div class="deco">
            <i class="fa-solid fa-arrow-right-from-bracket"></i> <a href="deconnexion.php"> Déconnexion </a>
        </div>
    </div>
</body>

</html>