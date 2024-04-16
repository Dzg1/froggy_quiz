<?php
$isPage="AdminQuiz";
include('../partials/header.php');

?>
<div class="bodyAdminQuiz">

    <h1 class="h1AdminQuiz">GEREZ VOTRE BASE DE DONNEES</h1>

<div class="centerCarteAdmin">

    <div class="carteAdminQuiz">

        <div class="btnAdminQuiz">

            <form action="DatabaseTheme.php" method="get" target="_blank">

                <button class="bAdminQuiz" type="submit" name="create">VOIR LES THEMES</button>

            </form>

            <form action="DatabaseQuiz.php" method="get" target="_blank">

                <button class="bAdminQuiz" type="submit" name="create">VOIR LES QUIZ</button>

            </form>

            <form action="DatabaseQuestion.php" method="get" target="_blank">

                <button class="bAdminQuiz" type="submit" name="create">VOIR LES QUESTIONS</button>

            </form>

            <form action="DatabaseAnswer.php" method="get" target="_blank">

                <button class="bAdminQuiz" type="submit" name="create">VOIR LES REPONSES</button>

            </form>

            <form action="formulaireIndex.php" target="_blank">

                <button class="bAdminQuiz" type="submit" name="udpdate">CREER DU CONTENU</button>

            </form>

            <form action="../../index.php" target="_blank">

                <button class="bAdminQuiz" type="submit" name="udpdate">RETOURNER SUR LA PAGE D'ACCUEIL DU SITE</button>

            </form>

        </div>

    </div>

</div>

</div>
</body>
