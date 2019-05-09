<?php

namespace Todo\Factories;

use Psr\Container\ContainerInterface;
use Todo\Controllers\CompleteTodoController;

class CompleteTodoControllerFactory
{
    public function __invoke(ContainerInterface $container) :CompleteTodoController
    {
        $todoModel = $container->get('todoModel');
        return new CompleteTodoController($todoModel);
    }
}
