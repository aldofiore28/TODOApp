<?php

namespace Todo\Factories;

use Psr\Container\ContainerInterface;
use Todo\Models\TodoModel;

class TodoModelFactory
{
    public function __invoke(ContainerInterface $container) :TodoModel
    {
        $db = $container->get('dbConnection');
        return new TodoModel($db);
    }
}
