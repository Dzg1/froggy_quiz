<?php
$isPage = "updateQuiz";
include('../partials/header.php');
require_once '../vendor/autoload.php';

use App\Repository\ThemeRepository;
use App\Class\Theme;
use App\Repository\QuizRepository;
use App\Class\Quiz;

$bdd= new PDO("mysql:host=127.0.0.1:3306;dbname=froggy_quiz", 'root', password:null);

if($bdd){
    echo "Connection successfull";
}else{
    die(mysqli_connect_error($bdd));
}


$newQuiz = new QuizRepository();
$displayQuiz = $newQuiz->findAll();

$idQuiz = intval($_GET['id']);

foreach ($displayQuiz as $quiz){
    if($quiz->getId() === $idQuiz){
        echo $result = $quiz->getName();
    }
}



?>
<div class="bodyUpdate">

    <div class="containerUpdate">



             <form method="get" class="dataUpdate" action="">
                 <div class="dataUpdate">
                        <label for="quizName">Remplacer le Quiz "<?php echo $result ?>" :</label><br>
                        <input type="text" id="quizName" name="quizName" value="<?php echo $result ?>"><br>

                        <input type="hidden" name="id" value="<?php echo $idQuiz?>"/>

                 </div>
                <input type="submit" name="Soumettre" value="Soumettre"/>

                    <?php if((!empty($_GET['Soumettre'])) && (!empty($_GET['quizName']))  ){

                     $quizName = $_GET['quizName'];

                    $updateQuiz = $bdd->query("UPDATE quiz SET name = '$quizName' WHERE id = '$idQuiz' ;");

                    if($updateQuiz){
                        echo "Données importées avec succes";?>
                    <?php }else{
                        die(mysqli_connect_error($bdd));
                        }

                        }?>



            </form>


        <div class="btnUpdate">
            <button><a href="DatabaseQuiz.php">Retour à la base de donnée</a></button>

            <button><a href="AdminQuiz.php">Retour à l'accueil Admin</a></button>
        </div>
    </div>

</div>
</body>

