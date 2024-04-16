<?php
$isPage = "updateAnswers";
include('../partials/header.php');
require_once '../vendor/autoload.php';

use App\Repository\QuestionRepository;
use App\Class\Question;
use App\Repository\AnswerRepository;
use App\Class\AnswerQcm;

$bdd= new PDO("mysql:host=127.0.0.1:3306;dbname=froggy_quiz", 'root', password:null);

if($bdd){
    echo "Connection successfull";
}else{
    die(mysqli_connect_error($bdd));
}

$newAnswer = new AnswerRepository();
$displayAnswer = $newAnswer->findAll();

$idAnswer = intval($_GET['id']);

foreach ($displayAnswer as $answer){
    if($answer->getId() === $idAnswer){
        echo $result = $answer->getAnswer();
    }
}

?>
<div class="bodyUpdate">

    <div class="containerUpdate">



            <form method="get" class="dataUpdate">

                <div class="dataUpdate">

                    <label for="answerName">Remplacer la réponse "<?php echo $result ?>" : </label><br>
                    <input type="text" id="answerName" name="answerName" value="<?php echo $result ?>"><br>


                    <input type="radio" name ="answerNameBool" id="answerNameBool" value="True">
                    <label for="answerNameBool">Vrai</label>
                    <input type="radio" name ="answerNameBool" id="answerNameBool" value="False">
                    <label for="answerNameBool">Faux</label>

                    <input type="hidden" name="id" value="<?php echo $idAnswer?>"/>

                </div>
                <input type="submit" name="Soumettre" value="Soumettre"/>



                 <?php if((isset($_GET['Soumettre'])) && (($_GET['answerNameBool'] == 'True') || ($_GET['answerNameBool'] == "False")) && (isset($_GET['answerName']))){


                    $answerName = $_GET['answerName'];

                    if($_GET['answerNameBool']== "True"){
                    $answerBool = 1;
                    }else{$answerBool = 0;}

                    $updateAnswer = $bdd->query("UPDATE answer SET answer = '$answerName', is_true = '$answerBool' WHERE id = '$idAnswer' ;");


                    if($updateAnswer){
                        echo "Données importées avec succes";?>

                    <?php }else{
                        die(mysqli_connect_error($bdd));
                        }
                 }?>



            </form>


        <div class="btnUpdate">
            <button><a href="DatabaseAnswer.php">Retour à la base de donnée</a></button>

            <button><a href="AdminQuiz.php">Retour à l'accueil Admin</a></button>
        </div>
    </div>
</div>
</body>

