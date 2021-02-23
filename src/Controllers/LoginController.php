<?php 

namespace App\Controllers;

use App\Services\Request;
use App\Services\UserSession;
use DI\Container;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use System\Abstracts\AbstractController;

class LoginController extends AbstractController
{
    protected $container;

    protected $request;

    protected $response;

    protected $session;

    public function __construct(Container $container, HttpFoundationRequest $request, Response $response, UserSession $session)
    {
        $this->container = $container;
        $this->request = $request; 
        $this->response = $response; 
        $this->session = $session; 
    }

    public function indexAction()
    {
        if($this->container->get(UserSession::class)->get('logged_in'))
        {
            header ( "Location: /", true , 302 );
            return;
        }

        $this->viewModel('login.html');
    }

    public function submitAction()
    {
        if($this->session->get("logged_in"))
        {
            header ( "Location: /", true , 302 );
            return;
        }

        $request = $this->request::createFromGlobals();
        
        if(!$request->isMethod("POST"))
        {
            header ( "Location: /", true , 302 );
            
        } else {
            $username = $request->request->get('username');
            $password = $request->request->get('password');

            if($username == 'bogdan' && $password == 'ciumac')
            {
                $this->session->get(UserSession::class);
                $this->session->addParam(['logged_in' => true]);
            }

            header ( "Location: /", true , 302 );
        }

        if($request->isMethod("POST"))
        {
        }
    }

    public function logoutAction()
    {
        if($this->request->getMethod("POST"))
        {
            $this->session->addParam(['logged_in' => false] );
            header("Location: /login");
        }
    }
}