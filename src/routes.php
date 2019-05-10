<?php

use Slim\App;

return function (App $app) {

    $app->get('/homepage', 'homePageController');
    $app->post('/homepage/addTodo', 'addTodo');
    $app->post('/homepage/completeTodo', 'completeTodo');
    $app->post('/homepage/reinsertTodo', 'insertCompletedTodo');
    $app->get('/', 'chooseUser');
};
