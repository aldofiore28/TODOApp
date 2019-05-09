<?php

namespace Todo\Factories;

use Todo\Controllers\HomePageController;

class HomePageControllerFactory
{
    public function __invoke($container)
    {
        $renderer = $container->get('renderer');
        $todoModel = $container->get('todoModel');
        return new HomePageController($renderer, $todoModel);
    }
}