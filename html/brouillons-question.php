<?php
$isPage = "questions";
include_once('../App/repository/QuizRepository.php');
include_once('../App/repository/QuestionsRepository.php');
include_once('../App/class/questions.php');
include_once('../App/repository/AnswerRepository.php');
include('../partials/header.php');

$idQuiz = intval($_GET['id']);

$quiz = new QuizRepository();
$question = new QuestionRepository();
$answer = new AnswerRepository();

$theQuiz = $quiz->findById($idQuiz);
$questions = $question->findByQuizId($idQuiz);
shuffle($questions);
$selectedQuestions = array_slice($questions, 0, 10);


if (!isset($_SESSION["score"])) {
    $_SESSION["score"] = 0;
}
if (!isset($_SESSION["currentQuestionIndex"])) {
    $_SESSION["currentQuestionIndex"] = 0;
}
$score = $_SESSION["score"];
$currentQuestionIndex = $_SESSION["currentQuestionIndex"];

$post = $_POST;

$currentQuestionIndex++;
?>
<div class="main">
    <div class="image">
        <img src="../assets/images/kaamelott.png">
    </div>

    <form action="../html/questions.php" method="post" class="responces">
        <?php
echo $score. " = score <br>";
echo $currentQuestionIndex. " = index de la question en cours <br>";
        if ($currentQuestionIndex <= count($selectedQuestions)) {

            // Récupère la question en cours
            $currentQuestion = $selectedQuestions[$currentQuestionIndex];

            // Récupère les réponses pour cette question
            $answers = $answer->findByQuestionId($currentQuestion->id);

            // Affiche la question et les réponses à l'utilisateur
            if (isset($_POST['question-' . $currentQuestion->id]) && $selectedAnswer->is_true==true && $_POST['question-' . $currentQuestion->id] == $selectedAnswer->id) {
                $idAnswerPost =  intval($_POST['question-_']);
                $selectedAnswer = $answer->findById($idAnswerPost);
                $score++;
                echo $score;
            }

        ?>
            <h1><?= $currentQuestion->question ?></h1>
            <?php
            foreach ($answers as $answer) {
            ?>
                <input type="radio" name="question-<?= $currentQuestion->id ?> " value="<?= $answer->id ?> "> <?= $answer->answer ?>
            <?php
            }
            ?>
            <input type="submit" value="Question suivante">
        <?php
            $_SESSION["score"] = $score;
            $_SESSION["currentQuestionIndex"] = $currentQuestionIndex;
            // Passe à la question suivante
            $currentQuestionIndex++;
        } else {
            // Toutes les questions ont été affichées, affiche le score final
            echo '<div class="results">';
            echo '<h2>Résultats</h2>';
            echo '<p>Tu as obtenu un score de ' . $score . ' / ' . count($selectedQuestions) . '.</p>';
            echo '</div>';
        }


        ?>

    </form>













    <div class="progress">


        <?php
        $steps = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
        foreach ($steps as $step) {
            $isResponced = false;
            $isCorrect = false;
            if ($isResponced == false) { ?>
                <img src="../assets/images/pattounes grise.png">
            <?php
            } elseif ($isResponced == true && $isCorrect == true) { ?>
                <img src="../assets/images/pattounes verte.png">
            <?php
            } elseif ($isResponced == true && $isCorrect == false) { ?>
                <img src="../assets/images/pattounes rouge.png">
        <?php
            }
        }
        ?>

    </div>

</div>
<?php
include('../partials/footer.php')
?>