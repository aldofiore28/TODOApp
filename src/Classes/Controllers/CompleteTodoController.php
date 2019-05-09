<?php

namespace Todo\Controllers;

class CompleteTodoController
{
    protected $todoModel;

    public function __construct($todoModel)
    {
        $this->todoModel = $todoModel;
    }
}