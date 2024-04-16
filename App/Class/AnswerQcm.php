<?php

namespace App\Class;

class AnswerQcm
{
    private int $id;

    private string $answer;

    private int $is_true;

    private int $question_id;

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
    public function getAnswer(): string
    {
        return $this->answer;
    }

    /**
     * @param string $answer
     */
    public function setAnswer(string $answer): void
    {
        $this->answer = $answer;
    }

    /**
     * @return int
     */
    public function getCheckId(): int
    {
        return $this->is_true;
    }

    /**
     * @param int $is_true
     */
    public function setCheckId(int $is_true): void
    {
        $this->is_true = $is_true;
    }

    /**
     * @return int
     */
    public function getQuestionId(): int
    {
        return $this->question_id;
    }

    /**
     * @param int $question_id
     */
    public function setQuestionId(int $question_id): void
    {
        $this->question_id = $question_id;
    }


}