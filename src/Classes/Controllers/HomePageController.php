<?php

namespace Todo\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\PhpRenderer;
use Todo\Models\TodoModel;

class HomePageController
{
    protected $renderer;
    protected $todoModel;

    public function __construct(PhpRenderer $renderer, TodoModel $todoModel)
    {
        $this->renderer = $renderer;
        $this->todoModel = $todoModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $todos = $this->todoModel->hydrateTodos();
        $completedTodos = $this->todoModel->hydrateCompletedTodos();
        $finalTodos = $this->todoModel->checkDate($todos, $completedTodos);
        $args['todos'] = $finalTodos['todos'];
        $args['completedTodos'] = $finalTodos['completedTodos'];
        $this->renderer->render($response, 'homePage.phtml', $args);
    }
}
