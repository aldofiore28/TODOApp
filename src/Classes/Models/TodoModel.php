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

    public function addTodo(string $description, string $deadline) :bool
    {
        $statement = 'INSERT INTO `todo_list`(`description`, `deadline`) VALUES (:description, :deadline);';
        $query = $this->dbConn->prepare($statement);
        $query->bindParam(':description', $description);
        $query->bindParam(':deadline', $deadline);
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

    public function checkDate(array $todos, array $completedTodos) :array
    {
        $todayDate = date('Y-m-d');
        foreach ($todos as $key=>$value) {
            if (date('Y-m-d', strtotime($value->getDeadline())) >= $todayDate) {
                continue;
            } else {
                array_push($completedTodos, $value);
                unset($todos[$key]);
            }
        }
        return ['todos' => $todos, 'completedTodos' => $completedTodos];
    }
}