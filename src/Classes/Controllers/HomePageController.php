<?php

namespace Todo\Controllers;

class HomePageController
{
    protected $renderer;
    protected $todoModel;

    public function __construct($renderer, $todoModel)
    {
        $this->renderer = $renderer;
        $this->todoModel = $todoModel;
    }

    public function __invoke($request, $response, $args)
    {
        $args['data'] = $this->todoModel->hydrateTodos();
        $this->renderer->render($response, 'homePage.phtml', $args);
    }
}
