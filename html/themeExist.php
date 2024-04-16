<?php
$isPage="themeExist";
require_once '../vendor/autoload.php';

error_reporting(E_ERROR | E_NOTICE | E_PARSE);

use App\Repository\ThemeRepository;
use App\Repository\QuizRepository;

include('../partials/header.php');
$bdd= new PDO("mysql:host=127.0.0.1:3306;dbname=froggy_quiz", 'root', password:null);

if($bdd){
    echo "Connection successfull";
}else{
    die(mysqli_connect_error($bdd));
}


$newThemes = new ThemeRepository();
$displayTheme = $newThemes->findAll();



$getTheme = $_GET['theme'];
$newQuiz = "nouveau Quiz";

foreach ($displayTheme as $item) {
    if($item->getName() === $getTheme){
       echo $result= $item->getId();
    }
}
$newsQuiz = new QuizRepository();
$displayQuiz = $newsQuiz->findAllById(intval($result));

?>
<div class="bodyCreate">
<div class="containerCreate">


         <h1>Modification sur le thème <?= $getTheme ?></h1>

            <h2>Créer un nouveau Quiz</h2>


        <fieldset class="fieldsetCreate">
            <legend><strong>---SELECTION---</strong></legend>


            <form method="GET" class="formCreate"  action="">

                <select class="selectOptionCreate" id="quiz" name="option" required>


                        <?php foreach ($displayQuiz as $quiz){ ?>
                            <option id="option" name="QuizChoice" value="<?= $quiz->getName()?>"><?= $quiz->getName()?></option>
                        <?php } ?>

                            <option id="option" name="newQuiz" value="<?= $newQuiz ?>" selected="selected" ><?= $newQuiz ?></option>

                </select>
                <input type="hidden" name="idTheme" value="<?php echo $result ?>" />

                 <input type="submit" name="selectionner" value="selectionner" />

                <?php if(isset($_GET['selectionner'] ) && ($_GET['selectionner']=== 'selectionner')){


          if ($_GET['option'] === $newQuiz) { ?>

                <button class="btnFI"><a href="createQuiz.php?idTheme=<?=$_GET['idTheme']?>"">Valider la création d'un nouveau Quiz</a></button>


            <?php }

            else{ ?>
                <button class="btnFI"><a href="quizExist.php?quiz=<?=$_GET['option']?>">Vous souhaitez ajouter des données sur le Quiz <?= $_GET['option'] ?></a></button>


            <?php }
        }else{
            print_r('vous allez entrer des données');
        }

        ?>


            </form>
        </fieldset>


</div>

</div>

</body>