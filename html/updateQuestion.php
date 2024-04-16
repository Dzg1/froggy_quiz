<?php
$isPage = "updateQuestion";
include('../partials/header.php');
require_once '../vendor/autoload.php';

use App\Repository\QuestionRepository;
use App\Class\Question;
use App\Repository\QuizRepository;
use App\Class\Quiz;

$bdd= new PDO("mysql:host=127.0.0.1:3306;dbname=froggy_quiz", 'root', password:null);

if($bdd){
    echo "Connection successfull";
}else{
    die(mysqli_connect_error($bdd));
}

$newQuestion = new QuestionRepository();
$displayQuestion = $newQuestion->findAll();

$idQuestion = intval($_GET['id']);

foreach ($displayQuestion as $question) {
    if($question->getId() === $idQuestion){
        echo $result = $question->getQuestion();
    }
}

?>
<div class="bodyUpdate">

    <div class="containerUpdate" class="dataUpdate">



            <form method="get">
                <div class="dataUpdate">
                    <label for="questionName">Remplacer la question "<?php echo $result ?>" : </label><br>
                    <input type="text" id="questionName" name="questionName" value="<?php echo $result ?>"><br>

                    <input type="hidden" name="id" value="<?php echo $idQuestion?>"/>
                </div>
                <input type="submit" name="Soumettre" value="Soumettre"/>

                <?php if((!empty($_GET['Soumettre'])) && (!empty($_GET['questionName']))  ){

                $questionName = $_GET['questionName'];


                $updateQuestion = $bdd->query("UPDATE questions SET question = '$questionName' WHERE id = '$idQuestion' ;");

                if($updateQuestion){
                     echo "Données importées avec succes";?>
                <?php }else{
                     die(mysqli_connect_error($bdd));
                    }
                }?>



            </form>


        <div class="btnUpdate">
            <button><a href="DatabaseQuestion.php">Retour à la base de donnée</a></button>

            <button><a href="AdminQuiz.php">Retour à l'accueil Admin</a></button>
        </div>
    </div>

</div>
</body>
