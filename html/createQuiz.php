<?php
$isPage="createTheme";
require_once '../vendor/autoload.php';


use App\Repository\ThemeRepository;
use App\Repository\QuizRepository;

include('../partials/header.php');
$bdd= new PDO("mysql:host=127.0.0.1:3306;dbname=froggy_quiz", 'root', password:null);

if($bdd){
    echo "Connection successfull";
}else{
    die(mysqli_connect_error($bdd));
}


$newsQuiz = new QuizRepository();
$displayTheme = $newsQuiz->findAll();

$newsQuiz = "nouveau Quiz";
$idTheme = $_GET['idTheme'];

?>
<div class="bodyCreate">
    <div class="containerCreate">

    <h1>Quel est le nom de votre nouveau Quiz</h1>
        <fieldset class="fieldsetCreate">
    <form method="GET" action="" class="formCreate">

        <label for="quiz"  >Entrer un nouveau Quiz :</label>

        <input type="text" class="inputCreate" name="quiz" id="quiz" value=""/>

        <input type="hidden" name="idTheme" value="<?php echo $idTheme ?>"/>

        <input type="submit" name="soumettre" value="soumettre"/>

        <?php if((isset($_GET['soumettre'])) && (isset($_GET['quiz']) )){


            $quiz = $_GET['quiz'];

            $addQuiz = $bdd->query("INSERT INTO quiz (quiz.name, quiz.theme_id) VALUES ('$quiz', '$idTheme');");

            if($addQuiz){
                echo "Données importées avec succes";?>
                <button><a href="formulaireIndex.php">Passer Au Questions</a></button>
            <?php }else{
                die(mysqli_connect_error($bdd));
            }
        }?>




    </form>
        </fieldset>
    </div>
</div>

</body>