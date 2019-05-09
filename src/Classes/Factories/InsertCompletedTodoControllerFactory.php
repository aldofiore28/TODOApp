<?php

namespace Todo\Factories;

use Psr\Container\ContainerInterface;
use Todo\Controllers\InsertCompletedTodoController;

class InsertCompletedTodoControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $todoModel = $container->get('todoModel');
        return new InsertCompletedTodoController($todoModel);
    }
}
