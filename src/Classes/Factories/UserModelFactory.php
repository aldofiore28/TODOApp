<?php

namespace Todo\Factories;

use Psr\Container\ContainerInterface;
use Todo\Models\UserModel;

class UserModelFactory
{
    public function __invoke(ContainerInterface $container) :UserModel
    {
        $db = $container->get('dbConnection');
        return new UserModel($db);
    }
}
