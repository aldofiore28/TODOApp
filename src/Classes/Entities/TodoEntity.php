<?php

namespace Todo\Entities;

class TodoEntity
{
    private $id;
    private $description;
    private $completed;

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