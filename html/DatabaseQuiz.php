<?php

use App\Repository\QuizRepository;

$isPage="DatabaseQuiz";
include('../partials/header.php');
require_once '../vendor/autoload.php';

// je définie le nombre d'élément par page
define('PER_PAGE', 10);

// On récupère le N° de la page avec par defaut (??) on est sur la page 1
$page = $_GET['p'] ?? 1;
// Condition pour l'affichage des pages avec un Offset dans la requete au dela de la page 1
$offset = ($page-1) * PER_PAGE;



//J'instancie ma base de données
$bdd= new PDO("mysql:host=127.0.0.1:3306;dbname=froggy_quiz", 'root', password:null);

//Je commence ma requete que j'initialise dans une variable $query
$allquizs = $bdd->query("SELECT quiz.id, quiz.name, quiz.theme_id, themes.name as nameTheme FROM quiz
INNER JOIN themes ON themes.id = quiz.theme_id LIMIT ". PER_PAGE ." OFFSET $offset");

// Si dans l'URL 'q' qui est le nom de l'imput a une valeur alors je concatene ma variable requete de base
if (!empty($_GET['q'])) {
    //Pour proteger mon code de insertions HTML
    $search = htmlspecialchars($_GET['q']);

    $allquizs = $bdd->query('SELECT quiz.id, quiz.name, quiz.theme_id, themes.name as nameTheme FROM quiz
INNER JOIN themes ON themes.id = quiz.theme_id  WHERE quiz.name LIKE "%'. $search .'%" LIMIT '. PER_PAGE ." OFFSET $offset");
}

// Pagination, je compte tous mes id
$quizCount = new QuizRepository();
$countId = $quizCount->findAll();
//Je compte le nombre de ligne
$countIdQuiz=count($countId);
// Pour connaitre le nombre de page on divise le total par le nombre d'élément par page Ceil pour arrondir au dessus
$pages = ceil($countIdQuiz / PER_PAGE);


?>

<div class="bodyDatabase">
    <div class="containerDatabase">

        <h1>Mes Quiz</h1>

        <form action="" class="formInput">
            <div class="">
                <input type="text" class="" name="q" placeholder="Rechercher par Quiz" value="<?= $_GET['q'] ?? null ?>">
            </div>
            <button>Rechercher</button>
        </form>

        <table>
            <thead>
            <tr>
                <th>Id</th>
                <th>Quiz</th>
                <th>Theme</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($allquizs as $quiz): ?>
                <tr>
                    <td>#<?= $quiz['id'] ?></td>
                    <td><?= $quiz['name'] ?></td>
                    <td><?= $quiz['nameTheme'] ?></td>
                    <td>
                        <div class="btnDatabase">
                        <a class="btn" href="updateQuiz.php?id=<?= $quiz['id']?>">Update</a>
                        <a class="btn" href="delete.php">Delete</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>

        <div class="paginationDatabase">
        <?php if ($pages > 1 && $page > 1): ?>
            <a href = "?p=<?= $page - 1 ?>" class="btnPagination">Page Précédente</a>
        <?php endif ?>


        <?php if ($pages > 1 && $page < $pages): ?>
            <a href = "?p=<?= $page + 1 ?>" class="btnPagination">Page Suivante</a>
        <?php endif ?>
        </div>
        <div class="buttonAccueilAdmin">
            <button><a href="AdminQuiz.php">Accueil Admin</a></button>

            <button><a href="../index.php">Accueil Principale</a></button>
        </div>

    </div>

</div>
</body>



