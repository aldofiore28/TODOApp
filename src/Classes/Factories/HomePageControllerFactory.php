<?php

namespace Todo\Factories;

use Psr\Container\ContainerInterface;
use Todo\Controllers\HomePageController;

class HomePageControllerFactory
{
    public function __invoke(ContainerInterface $container) :HomePageController
    {
        $renderer = $container->get('renderer');
        $todoModel = $container->get('todoModel');
        return new HomePageController($renderer, $todoModel);
    }
}