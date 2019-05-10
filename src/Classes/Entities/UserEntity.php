<?php

namespace Todo\Entities;

class UserEntity
{
    private $id;
    private $user_name;

    /**
     * @return int
     */
    public function getId() :int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUserName() :string
    {
        return $this->user_name;
    }
}
