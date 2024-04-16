<?php
$isPage="quizExist";
require_once '../vendor/autoload.php';


use App\Repository\ThemeRepository;
use App\Repository\QuizRepository;
use App\Repository\QuestionRepository;
use App\Class\Quiz;

include('../partials/header.php');
$bdd= new PDO("mysql:host=127.0.0.1:3306;dbname=froggy_quiz", 'root', password:null);

if($bdd){
    echo "Connection successfull";
}else{
    die(mysqli_connect_error($bdd));
}


$newQuiz = new QuizRepository();
$displayQuiz = $newQuiz->findAll();



$getQuiz = $_GET['quiz'];
$newQuestion = "nouvelle Question";

foreach ($displayQuiz as $quiz) {
    if($quiz->getName() === $getQuiz){
        echo $result= $quiz->getId();
    }
}


?>

<div class="bodyCreate">
    <div class="containerCreate">


    <h1>Modification sur le Quiz "<?= $getQuiz ?>"</h1>

        <h2>Créer les Questions </h2>


        <fieldset class="fieldsetCreate">
            <legend><strong>Entrez Vos Données</strong></legend>

            <form method="get" class="formCreate" action="">

                <label for="question" >Entrer la nouvelle question pour le Quiz : "<?= $getQuiz ?>"</label>
                <input type="text" class="inputCreate" name="question" placeholder="Entrer la question"/>


                <input type="hidden" name="id" value="<?php echo $result?>"/>
                <input type="hidden" name="name" value="<?php echo $getQuiz?>"/>

                <input type="submit" name="soumettre" value="soumettre"/>


<?php if((!empty($_GET['question'])) && (!empty($_GET['soumettre']))){

    $question = htmlentities($_GET['question']);
    $idQuiz = $_GET['id'];

    $addQuestion = $bdd->query("INSERT INTO questions (questions.question, questions.quiz_id) VALUES ('$question', $idQuiz);");

    if($addQuestion){
        echo "Données importées avec succes";?>
        <button class="btnFI"><a href="createAnswer.php?idQuiz=<?= $_GET['id']?>&nameQuestion=<?= $_GET['question']?>">Aller aux réponses</a></button>

    <?php }else{
        die(mysqli_connect_error($bdd));
    }
}?>


            </form>
        </fieldset>

    </div>
</div>
</body>