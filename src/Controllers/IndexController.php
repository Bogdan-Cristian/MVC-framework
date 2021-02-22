<?php

namespace App\Controllers;

use App\Services\Database;
use DI\Container;
use Symfony\Component\HttpFoundation\Response;
use System\Abstracts\AbstractController;
use System\Core\ViewModule\TwigModule;

class IndexController extends AbstractController
{
    protected $response;

    protected $container;

    public function __construct(Container $container, Response $response, TwigModule $twig)
    {
        $this->container = $container;
        $this->response = $response;
    }

    public function indexAction()
    {
        $this->viewModel('index.html', ['name'=> 'banan']);
    }

    public function postAction()
    {
        
    }
}