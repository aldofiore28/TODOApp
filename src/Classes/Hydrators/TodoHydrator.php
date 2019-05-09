<?php

namespace Todo\Hydrators;

use Todo\Entities\TodoEntity;

class TodoHydrator
{
    public static function getTodos($dbConn)
    {
        $statement = 'SELECT `id`, `description`, `completed` FROM `todo_list`;';
        $query = $dbConn->prepare($statement);
        try {
            $query->execute();
            return $query->fetchAll(\PDO::FETCH_CLASS, TodoEntity::class);
        } catch (\PDOException $exception) {
            echo 'Unexpected error';
        }
    }
}
