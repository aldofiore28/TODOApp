<?php

namespace Todo\Factories;

use Psr\Container\ContainerInterface;
use Todo\Controllers\RedirectUserController;

class RedirectUserFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new RedirectUserController();
    }
}