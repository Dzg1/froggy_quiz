<?php

namespace App\Repository;

use App\Class\Question;
use http\Params;
use \PDO;
use App\Class\Theme;


class ThemeRepository extends AbstractRepository
{

    public function findAll():array{
         return $this->pdo
        ->query('SELECT * FROM `themes`')
        ->fetchAll(PDO::FETCH_CLASS, Theme::class);

    }

    public function findAllLimit():array{
        return $this->pdo
            ->query('SELECT * FROM `themes` LIMIT 10')
            ->fetchAll(PDO::FETCH_CLASS, Theme::class);

    }


    public function findById(INT $id){
        $query = $this->pdo
            ->prepare("SELECT themes.name FROM themes WHERE themes.id = ?;");
        $query->bindValue(1, $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchObject( Theme::class);
    }




    public function findIdByName(string $name):array{
        $query = $this->pdo
            ->prepare('SELECT themes.id FROM themes WHERE themes.name = $name;');
        $query->bindValue(1, $name, PDO::PARAM_STR_CHAR);
        $query->execute();
        return $query->fetch(PDO::FETCH_CLASS, Theme::class);
    }



}
