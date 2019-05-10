<?php

namespace Todo\Models;

use Todo\Hydrators\UserHydrator;

class UserModel
{
    private $dbConn;

    public function __construct(\PDO $dbConn)
    {
        $this->dbConn = $dbConn;
    }

    public function hydrateUsers()
    {
        return UserHydrator::getUsers($this->dbConn);
    }

    public function addNewUser(string $username)
    {
        $statement = 'INSERT INTO `users`(`user_name`) VALUES (:username);';
        $query = $this->dbConn->prepare($statement);
        $query->bindParam(':username', $username);
        try {
            return $query->execute();
        } catch (\PDOException $exception) {
            echo 'Error!';
        }
    }
}