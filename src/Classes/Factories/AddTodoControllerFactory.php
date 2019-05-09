<?php

namespace Todo\Factories;

use Psr\Container\ContainerInterface;
use Todo\Controllers\AddTodoController;

class AddTodoControllerFactory
{
    public function __invoke(ContainerInterface $container) :AddTodoController
    {
        $todoModel = $container->get('todoModel');
        return new AddTodoController($todoModel);
    }
}
