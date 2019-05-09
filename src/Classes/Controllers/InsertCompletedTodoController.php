<?php

namespace Todo\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use Todo\Models\TodoModel;

class InsertCompletedTodoController
{
    protected $todoModel;

    public function __construct(TodoModel $todoModel)
    {
        $this->todoModel = $todoModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $userData = $request->getParsedBody();
        $id = $userData['id'];
    }
}