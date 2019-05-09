<?php

namespace Todo\Entities;

class Todo
{
    private $id;
    private $description;
    private $completed;

    public function __construct($id, $description, $completed)
    {
        $this->id = $id;
        $this->description = $description;
        $this->completed = $completed;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getCompleted()
    {
        return $this->completed;
    }
}