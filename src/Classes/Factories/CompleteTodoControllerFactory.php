<?php

namespace Todo\Factories;

use Todo\Controllers\CompleteTodoController;

class CompleteTodoControllerFactory
{
    public function __invoke($container)
    {
        $todoModel = $container->get('todoModel');
        return new CompleteTodoController($todoModel);
    }
}
