<?php

namespace Todo\Factories;

use Psr\Container\ContainerInterface;
use Todo\Controllers\NewUserController;

class NewUserControllerFactory
{
    public function __invoke(ContainerInterface $container) :NewUserController
    {
        $userModel = $container->get('userModel');
        return new NewUserController($userModel);
    }
}
