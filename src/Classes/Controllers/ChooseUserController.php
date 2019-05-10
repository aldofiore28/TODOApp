<?php

namespace Todo\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\PhpRenderer;
use Todo\Models\UserModel;

class ChooseUserController
{
    protected $userModel;
    protected $renderer;

    public function __construct(UserModel $userModel, PhpRenderer $renderer)
    {
        $this->userModel = $userModel;
        $this->renderer = $renderer;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $args['users'] = $this->userModel->hydrateUsers();
        $this->renderer->render($response, 'chooseUser.phtml', $args);
    }
}
