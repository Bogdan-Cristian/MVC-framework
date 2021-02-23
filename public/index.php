<?php
// Requires
require_once "../vendor/autoload.php";

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use System\Core\FileSystem\RootFS;

// Container
$container = new DI\Container();
$builder = new DI\ContainerBuilder();
$container = $builder->build();

// FileSystem
$fl = $container->get(RootFS::class);
$fl->setRoot(__DIR__ . "/.." . DIRECTORY_SEPARATOR);


// Request
$request = Request::createFromGlobals();
$path = $request->getPathInfo();
require_once "./routes.php";

if (isset($map[$path])) {

    $controller = $container->get($map[$path]['controller']);

    $action = $map[$path]['action'];
    ob_start();

    extract($request->query->all(), EXTR_SKIP);
    
    $controller->$action();

} else {

    $response = new Response('Not Found', 404);

}


