<?php

namespace Todo\Controllers;

class AddTodoController
{
    protected $todoModel;

    public function __construct($todoModel)
    {
        $this->todoModel = $todoModel;
    }

    public function __invoke($request, $response, $args)
    {
        $userData = $request->getParsedBody();
        $description = $userData['description'];
        $result = $this->todoModel->addTodo($description);
        if ($result) {
            return $response->withRedirect('/');
        }
    }
}
