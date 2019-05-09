<?php

namespace Todo\Models;

use Todo\Hydrators\TodoHydrator;

class TodoModel
{
    private $dbConn;

    public function __construct(\PDO $dbConn)
    {
        $this->dbConn = $dbConn;
    }

    public function hydrateTodos()
    {
        return TodoHydrator::getTodos($this->dbConn);
    }

    public function addTodo($description)
    {
        $statement = 'INSERT INTO `todo_list`(`description`) VALUES (:description);';
        $query = $this->dbConn->prepare($statement);
        $query->bindParam(':description', $description);
        try {
            return $query->execute();
        } catch (\PDOException $exception) {
            echo 'Unexpected error';
        }
    }
}