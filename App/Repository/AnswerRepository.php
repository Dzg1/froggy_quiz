<?php
namespace App\Repository;

use App\Class\AnswerQcm;
use \PDO;

class AnswerRepository extends AbstractRepository
{
    public function findAll():array{
        return $this->pdo
        ->query('SELECT * FROM `answer`')
        ->fetchAll(PDO::FETCH_CLASS, AnswerQcm::class);
    }

    public function findAllLimit():array{
        return $this->pdo
            ->query('SELECT answer.id, answer.answer, answer.question_id, answer.is_true, questions.question as questionName FROM answer
                            INNER JOIN questions ON questions.id = answer.question_id
                            LIMIT 4;')
            ->fetchAll(PDO::FETCH_CLASS, AnswerQcm::class);
    }

    public function findById(INT $id){
        $query = $this->pdo
        ->prepare('SELECT * FROM `answer`WHERE answer.id = ? ;');
        $query->bindValue(1, $id ,PDO::PARAM_INT);
        $query->execute();
        return $query->fetchObject(AnswerQcm::class);
    }

    public function findByQuestionId(INT $questionId):array{
        $query = $this->pdo
        ->prepare('SELECT * FROM `answer` WHERE Answer.question_id = ?;');
        $query->bindValue(1, $questionId, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, AnswerQcm::class);
    }

    public function getAnswerById($id)
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
            $answer = $this->findById($id);
            echo( json_encode($answer));
        }
    }






}