<?php

namespace Todo\Factories;

use Psr\Container\ContainerInterface;
use Todo\Controllers\ChooseUserController;

class ChooseUserControllerFactory
{
    public function __invoke(ContainerInterface $container) :ChooseUserController
    {
        $renderer = $container->get('renderer');
        $userModel = $container->get('userModel');
        return new ChooseUserController($userModel, $renderer);
    }
}
