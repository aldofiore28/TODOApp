<?php

namespace Todo\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use Todo\Models\UserModel;

class NewUserController
{
    protected $userModel;

    public function __construct(UserModel $userModel)
    {
        $this->userModel = $userModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $newUser = $request->getParsedBody();
        $userName = $newUser['username'];
        $result = $this->userModel->addNewUser($userName);
        if ($result) {
            return $response->withRedirect('/');
        }
    }
}
