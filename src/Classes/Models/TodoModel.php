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

    public function hydrateCompletedTodos()
    {
        return TodoHydrator::getCompletedTodos($this->dbConn);
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

    public function completeTodo($id)
    {
        $statement = 'UPDATE `todo_list` SET `completed` = 1 WHERE `id` = :id';
        $query = $this->dbConn->prepare($statement);
        $query->bindParam(':id', $id);
        try {
            return $query->execute();
        } catch(\PDOException $exception) {
            echo 'Error!';
        }
    }
}