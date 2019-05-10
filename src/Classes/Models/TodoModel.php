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

    public function hydrateTodos() :array
    {
        return TodoHydrator::getTodos($this->dbConn);
    }

    public function hydrateCompletedTodos() :array
    {
        return TodoHydrator::getCompletedTodos($this->dbConn);
    }

    public function addTodo(string $description, string $date) :bool
    {
        $statement = 'INSERT INTO `todo_list`(`description`, `deadline`) VALUES (:description, :date);';
        $query = $this->dbConn->prepare($statement);
        $query->bindParam(':description', $description);
        $query->bindParam(':date', $date);
        try {
            return $query->execute();
        } catch (\PDOException $exception) {
            echo 'Unexpected error';
        }
    }

    public function completeTodo(int $id) :bool
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

    public function reInsertTodo(int $id) :bool
    {
        $statement = 'UPDATE `todo_list` SET `completed` = 0 WHERE `id` = :id';
        $query = $this->dbConn->prepare($statement);
        $query->bindParam(':id', $id);
        try {
            return $query->execute();
        } catch(\PDOException $exception) {
            echo 'Error!';
        }
    }
}