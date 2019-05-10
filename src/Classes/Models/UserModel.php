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
}