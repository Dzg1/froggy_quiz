<?php

namespace App\Repository;

use \PDO;

class AbstractRepository
{

    protected PDO $pdo;

    private string $url;
    private string $user;
    private string $pwd;

    public function __construct()
    {
         $this->url = 'mysql:host=127.0.0.1:3306;dbname=froggy_quiz';
         $this->user = 'root';
         $this->pwd = '';
         $this->pdo = new PDO($this->url, $this->user, $this->pwd);
    }
}