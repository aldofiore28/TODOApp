<?php

namespace Todo\Entities;

class TodoEntity
{
    private $id;
    private $description;
    private $completed;

    /**
     * @return integer
     */
    public function getId() :int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getDescription() :string
    {
        return $this->description;
    }

    /**
     * @return integer
     */
    public function getCompleted() :int
    {
        return $this->completed;
    }
}