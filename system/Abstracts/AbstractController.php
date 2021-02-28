<?php

namespace System\Abstracts;

use DI\Container;
use Symfony\Component\HttpFoundation\Request;
use System\Core\ViewModule\TwigModule;

abstract class AbstractController
{
    protected $container;

    protected $request;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function viewModel($path, $params =[])
    {
        $twig = $this->container->get(TwigModule::class);
        return $twig->render($path, $params);
    }

    
    public function setContainer(Container $container)
    {
        $this->container = $container;
    }

    public function getRequest()
    {
        return Request::createFromGlobals();
    }
}