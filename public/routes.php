<?php

use App\Controllers\IndexController;

$map = [
    '/index' => [
        "controller" => IndexController::class,
        "action" => "indexAction"
    ],
    '/post' => [
        "controller" => IndexController::class,
        "action" => "postAction"
    ],
];