<?php

namespace App\Controllers;

use App\Services\Database;
use App\Services\UserSession;
use DI\Container;
use Symfony\Component\HttpFoundation\Session\Session;
use System\Abstracts\AbstractController;
use System\Core\Factories\DatabaseFactory;
use System\Core\ViewModule\TwigModule;
use Entity\Product;
use App\Services\Request;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;

class IndexController extends AbstractController
{
    protected $container;

    protected $session;

    protected $db;

    public function __construct(Container $container, UserSession $session, DatabaseFactory $dbFactory)
    {
        
        $this->container = $container;
        $this->session = $session;
        $this->db = $dbFactory;
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

        $this->viewModel('index.html', $params);
    }

    public function postAction()
    {

    }
}