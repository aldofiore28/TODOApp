<?php

namespace Todo\Factories;

use Todo\Models\TodoModel;

class TodoModelFactory
{
    public function __invoke($container)
    {
        $db = $container->get('dbConnection');
        return new TodoModel($db);
    }
}
