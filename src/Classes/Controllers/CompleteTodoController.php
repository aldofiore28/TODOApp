<?php

namespace Todo\Controllers;

class CompleteTodoController
{
    protected $todoModel;

    public function __construct($todoModel)
    {
        $this->todoModel = $todoModel;
    }

    public function __invoke($request, $response, $args)
    {
        $userData = $request->getParsedBody();
        $id = $userData['id'];
        $result = $this->todoModel->completeTodo($id);
        if ($result) {
            return $response->withRedirect('/');
        }
    }
}