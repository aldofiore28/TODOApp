<?php

use Slim\App;

return function (App $app) {

    $app->get('/', 'homePageController');
    $app->post('/addTodo', 'addTodo');
    $app->post('/completeTodo', 'completeTodo');
};
