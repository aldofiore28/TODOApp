<?php

namespace Todo\Hydrators;

use Todo\Entities\TodoEntity;

class TodoHydrator
{
    public static function getTodos(\PDO $dbConn, string $userId) :array
    {
        $statement = 'SELECT `id`, `description`, `completed`, `deadline` FROM `todo_list` WHERE `completed` = 0 AND `list_user_id` = :userId;';
        $query = $dbConn->prepare($statement);
        $query->bindParam(':userId', $userId);
        try {
            $query->execute();
            return $query->fetchAll(\PDO::FETCH_CLASS, TodoEntity::class);
        } catch (\PDOException $exception) {
            echo 'Unexpected error';
        }
    }

    public static function getCompletedTodos(\PDO $dbConn, string $userId) :array
    {
        $statement = 'SELECT `id`, `description`, `completed`, `deadline` FROM `todo_list` WHERE `completed` = 1 AND `list_user_id` = :userId;';
        $query = $dbConn->prepare($statement);
        $query->bindParam(':userId', $userId);
        try {
            $query->execute();
            return $query->fetchAll(\PDO::FETCH_CLASS, TodoEntity::class);
        } catch (\PDOException $exception) {
            echo 'Unexpected error';
        }
    }
}
