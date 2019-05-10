<?php

use Slim\App;

return function (App $app) {
    $container = $app->getContainer();

    // view renderer
    $container['renderer'] = function ($c) {
        $settings = $c->get('settings')['renderer'];
        return new \Slim\Views\PhpRenderer($settings['template_path']);
    };

    // database
    $container['dbConnection'] = function ($c) {
        $settings = $c->get('settings')['db'];
        $db = new PDO($settings['host'].$settings['dbName'], $settings['userName']);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        return $db;
    };

    // monolog
    $container['logger'] = function ($c) {
        $settings = $c->get('settings')['logger'];
        $logger = new \Monolog\Logger($settings['name']);
        $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
        $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
        return $logger;
    };

    //Factories
    $container['todoModel'] = new \Todo\Factories\TodoModelFactory();
    $container['homePageController'] = new \Todo\Factories\HomePageControllerFactory();
    $container['addTodo'] = new \Todo\Factories\AddTodoControllerFactory();
    $container['completeTodo'] = new \Todo\Factories\CompleteTodoControllerFactory();
    $container['insertCompletedTodo'] = new \Todo\Factories\InsertCompletedTodoControllerFactory();
    $container['userModel'] = new \Todo\Factories\UserModelFactory();
    $container['chooseUser'] = new \Todo\Factories\ChooseUserControllerFactory();
    $container['redirectUser'] = new \Todo\Factories\RedirectUserFactory();
    $container['addNewUser'] = new \Todo\Factories\NewUserControllerFactory();
};
