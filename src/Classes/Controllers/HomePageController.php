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
        $args['todos'] = $this->todoModel->hydrateTodos();
        $args['completedTodos'] = $this->todoModel->hydrateCompletedTodos();
        $this->renderer->render($response, 'homePage.phtml', $args);
    }
}
