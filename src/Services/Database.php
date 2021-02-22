<?php

namespace App\Services;
use Symfony\Component\HttpFoundation\Request;
use System\Abstracts\AbstractController;

class Database extends AbstractController
{

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        var_dump($this->request->getPathInfo());
    }

}