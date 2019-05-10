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
        if(isset($_SESSION['userId'])) {
            $id = $_SESSION['userId'];
            return TodoHydrator::getTodos($this->dbConn, $id);
        }
    }

    public function hydrateCompletedTodos() :array
    {
        if(isset($_SESSION['userId'])) {
            $id = $_SESSION['userId'];
            return TodoHydrator::getCompletedTodos($this->dbConn, $id);
        }
    }

    public function addTodo(string $description, string $deadline, string $listUserId) :bool
    {
        $statement = 'INSERT INTO `todo_list`(`description`, `deadline`, `list_user_id`) VALUES (:description, :deadline, :listUserId);';
        $query = $this->dbConn->prepare($statement);
        $query->bindParam(':description', $description);
        $query->bindParam(':deadline', $deadline);
        $query->bindParam(':listUserId', $listUserId);
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