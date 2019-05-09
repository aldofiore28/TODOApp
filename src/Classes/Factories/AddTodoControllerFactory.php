<?php

namespace Todo\Factories;

use Todo\Controllers\AddTodoController;

class AddTodoControllerFactory
{
    public function __invoke($container)
    {
        $todoModel = $container->get('todoModel');
        return new AddTodoController($todoModel);
    }
}
