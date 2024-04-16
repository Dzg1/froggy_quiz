<?php
namespace App\Repository;

use App\Class\Question;
use \PDO;

class QuestionRepository extends AbstractRepository
{
    public function findAll():array
    {
        return $this->pdo
            ->query('SELECT * FROM `questions`')
            ->fetchAll(PDO::FETCH_CLASS, Question::class);
    }


    public function findTheLastId():array
    {
        return $this->pdo
            ->query('SELECT * FROM `questions` ORDER BY questions.id DESC LIMIT 1;')
            ->fetchAll(PDO::FETCH_CLASS, Question::class);
    }





    public function findAllLimit():array
    {
        return $this->pdo
            ->query('SELECT questions.id, questions.question, questions.quiz_id, quiz.name as quizName FROM questions
                                INNER JOIN quiz ON quiz.id = questions.quiz_id
                                LIMIT 10')
            ->fetchAll(PDO::FETCH_CLASS, Question::class);
    }

    public function findById(INT $id){
        $query = $this->pdo
        ->prepare('SELECT * FROM `questions`WHERE questions.id = ? ;');
        $query->bindValue(1, $id ,PDO::PARAM_INT);
        $query->execute();
        return $query->fetchObject(Question::class);
    }

    public function findByName(string $name){
        $query = $this->pdo
            ->prepare('SELECT * FROM `questions`WHERE questions.question = ? ;');
        $query->bindValue(1, $name ,PDO::PARAM_STR_CHAR);
        $query->execute();
        return $query->fetchColumn(0);
    }




    public function findByTheme(INT $themeId, INT $limit):array{
        $query = $this->pdo
        ->prepare('SELECT * FROM `questions` WHERE questions.theme_id = ? LIMIT ? ;');
        $query->bindValue(1, $themeId, PDO::PARAM_INT);
        $query->bindValue(2, $limit, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, Question::class);
    }
    public function findByQuizId(INT $quizId):array{
        $query = $this->pdo
        ->prepare('SELECT * FROM `questions` WHERE questions.quiz_id = ?;');
        $query->bindValue(1, $quizId, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, Question::class);
    }





}