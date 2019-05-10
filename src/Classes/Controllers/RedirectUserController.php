<?php

namespace Todo\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

class RedirectUserController
{
    public function __invoke(Request $request, Response $response, array $args)
    {
        $user = $request->getParsedBody();
        $userId = $user['user_id'];
        $_SESSION['userId'] = $userId;
        return $response->withRedirect('/homepage');
    }
}