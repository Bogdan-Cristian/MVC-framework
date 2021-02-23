<?php

use App\Controllers\IndexController;
use App\Controllers\LoginController;

$map = [
    '/' => [
        "controller" => IndexController::class,
        "action" => "indexAction"
    ],
    '/index' => [
        "controller" => IndexController::class,
        "action" => "indexAction"
    ],
    '/post' => [
        "controller" => IndexController::class,
        "action" => "postAction"
    ],
    '/login' => [
        "controller" => LoginController::class,
        "action" => "indexAction"
    ],
    '/login/submit' => [
        "controller" => LoginController::class,
        "action" => "submitAction"
    ],
    '/login/logout' => [
        "controller" => LoginController::class,
        "action" => "logoutAction"
    ],
];