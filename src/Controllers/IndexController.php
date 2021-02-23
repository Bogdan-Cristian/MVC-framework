<?php

namespace App\Controllers;

use App\Services\Database;
use App\Services\UserSession;
use DI\Container;
use Symfony\Component\HttpFoundation\Session\Session;
use System\Abstracts\AbstractController;
use System\Core\ViewModule\TwigModule;

class IndexController extends AbstractController
{
    protected $container;

    protected $session;
    public function __construct(Container $container, UserSession $session)
    {
        $this->container = $container;
        $this->session = $session;
    }

    public function indexAction()
    {
        $params = [];
        if($this->session->get('logged_in'))
        {
            $userStatus = true;
            $params['logged_in'] = $userStatus;
        }

        $params['name'] = "Bogdan";

        var_dump($_SESSION);
        $this->viewModel('index.html', $params);
    }

    public function postAction()
    {

    }
}