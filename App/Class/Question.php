<?php
namespace App\Class;


class Question
{
    private int $id;

    private string $question;

    private int $quiz_id;



    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getQuestion(): string
    {
        return $this->question;
    }

    /**
     * @param string $question
     */
    public function setQuestion(string $question): void
    {
        $this->question = $question;
    }

    /**
     * @return int
     */
    public function getQuizId(): int
    {
        return $this->quiz_id;
    }

    /**
     * @param int $quiz_id
     */
    public function setQuizId(int $quiz_id): void
    {
        $this->quiz_id = $quiz_id;
    }


}