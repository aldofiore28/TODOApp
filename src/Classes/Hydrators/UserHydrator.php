<?php

namespace Todo\Hydrators;

use Todo\Entities\UserEntity;

class UserHydrator
{
    public static function getUsers(\PDO $dbConn) :array
    {
        $statement = 'SELECT `id`, `user_name` FROM `users`;';
        $query = $dbConn->prepare($statement);
        try {
            $query->execute();
            return $query->fetchAll(\PDO::FETCH_CLASS, UserEntity::class);
        } catch (\PDOException $exception) {
            echo 'Error!';
        }
    }
}
