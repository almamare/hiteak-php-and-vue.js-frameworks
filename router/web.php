<?php

/**
 * @author      Hi-Teak Digital Solution Ltd
 * @copyright   Copyright (c), 2023 Hi-Teak Digital Solution Ltd
 * @license     MIT public license
 */

use App\Core\Router;
use App\Core\Template;

// Create a Template
$tpl = new Template();

// Create a Router
$router = new Router();



$router->get('/', function () use ($tpl) {
    $tpl->data(["url" => "Home"]);
    $tpl->title("Home");
    $tpl->load('Home');
});
$router->get('/Login', function () use ($tpl) {
    $tpl->data(["url" => "Login"]);
    $tpl->title("Login");
    $tpl->load('Login');
});


$router->set404(function () {
    require 'templates/layout/404.php';
});
