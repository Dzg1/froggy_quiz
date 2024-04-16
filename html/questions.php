<?php

require_once '../vendor/autoload.php';

include_once('./App/Repository/QuizRepository.php');
include_once('./App/Repository/QuestionRepository.php');
include_once('./App/Repository/AnswerRepository.php');



$isPage = "questions";

include('../partials/header.php');

// Récupération de l'id du quiz à partir de l'URL
$idQuiz = intval($_GET['id']);

//instanciation des repository
$quiz = new QuizRepository();
$question = new QuestionRepository();
$answer = new AnswerRepository();

// Récupération du quiz en fonction de l'id
$theQuiz = $quiz->findById($idQuiz);

// Récupération des questions pour le quiz
$questions = $question->findByQuizId($idQuiz);

// Mélange des questions
shuffle($questions);

// Sélection des 10 premières questions
$selectedQuestions = array_slice($questions, 0, 12);


// Récupération des réponses pour les questions sélectionnées
for ($i = 0; $i < 10; $i++) {
  $answers[$i] = $answer->findByQuestionId($selectedQuestions[$i]->id);
}
?>
<ul class="circles">
  <li>?</li>
  <li>?</li>
  <li>?</li>
  <li>?</li>
  <li>?</li>
  <li>?</li>
  <li>?</li>
  <li>?</li>
  <li>?</li>
  <li>?</li>
  <div class="main"> 
    <div class="margin-container">
      <form action="../html/result.php" method="post">
        <div class="question-container submit-container">
        <input type="hidden" name="id" value="<?=$idQuiz?>">
          <input class="btn-suivant" type="submit"  value="Découvrez votre score">
        </div>
        <?php
        // Boucle pour afficher les 10 questions sélectionnées
        for ($i = 0; $i < 10; $i++) {
        ?>
          <div class="question-container" id="qc<?= $i ?>">
            <img class="img-question" src="../assets/images/quiz-paysage/<?= $selectedQuestions[$i]->id ?>.png" alt="Photo de <?= $theQuiz->name ?> ">
            <div class="qr-container">
              <div class="question">
                <h2><?= $selectedQuestions[$i]->question ?></h2>
              </div>
              <div class="reponse-container">
                <?php
                // Boucle pour afficher les réponses pour chaque question
                foreach ($answers[$i] as $answer) {
                  ?>
                  <label>
                    <input type="radio" name="quiz<?php echo $i; ?>" value="<?php echo $answer->id; ?>" class="input-hidden">
                    <div class="reponse <?= $answer->is_true ? 'true' : '' ?>"><span class="span-reponse"><?= $answer->answer ?></span></div>
                  </label>
                <?php } ?>
              </div>
              <div  class=" next">Question suivant</div>
            </div>
          </div>
          <?php
        }
        ?>
        <div id="starter">
          <h2><?= $theQuiz->name ?></h2>
          <div class="btn-suivant" id="start"><span class="span-start">Commencez le quiz</span></div>
        </div>
      </form>
    </div>
  </div>
</ul>
<?php
include('../partials/footer.php')
?>