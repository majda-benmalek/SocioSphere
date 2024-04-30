<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/question.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;500&display=swap" rel="stylesheet">
    <title>
        Question
    </title>
</head>

<body>
    <div class="tout">
        <div class="text"> En cas de mot de passe oublié: </div>
        <br>
        <div class="text2"><em>Veuillez choisir une question, repondez et gardez precieusement la reponse car en cas de perte de mot de passe cette meme question vous sera re-poser</em></div>
        <br>

        <form action="TraitementQuestion.php" method="post">
            <span> Votre pseudo: </span> <input type="text" name="pseudo" placeholder="Votre pseudo" required>
            <br>
            <span>Choisissez:</span>
            <select name="q" required>
                <option value=""> --Choississez-- </option>
                <option value="Quel est le nom et prénom de votre premier amour ?"> Quel est le nom et prénom de votre premier amour ? </option>
                <option value="Quel est le nom de famille de votre professeur d'enfance préféré ?"> Quel est le nom de famille de votre professeur d'enfance préféré ? </option>
                <option value="Quel est le prénom de votre arrière-grand-mère maternelle ?"> Quel est le prénom de votre arrière-grand-mère maternelle ? </option>
                <option value=" Quelle est votre couleur favorite ? "> Quelle est votre couleur favorite ? </option>
                <option value="Qu’est-ce vous vouliez devenir plus grand, lorsque vous étiez enfant ?"> Qu’est-ce vous vouliez devenir plus grand, lorsque vous étiez enfant ? </option>
            </select>
            <br>
            <span>Votre reponse:</span><input type="text" name="reponse" placeholder="Votre reponse" required>
            <br>
            <input type="submit" name="Suivant" value="Suivant" class="btnSuivant">
        </form>
    </div>


</body>

</html>