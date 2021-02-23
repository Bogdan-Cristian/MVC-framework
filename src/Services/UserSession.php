<?php

namespace App\Services;

use Exception;

class UserSession
{

    public function __construct()
    {
        session_start();
    }

    public function addParam($params = [])
    {
        if(is_array($params))
        {
            foreach($params as $param_key => $param_value)
            {
                $_SESSION[$param_key] = $param_value;
            }
            return;
        }

        throw new Exception("Session params must be an array");
    }

    public function get($param_name)
    {
        if(isset($_SESSION[$param_name]))
        {
            return $_SESSION[$param_name];
        }

        return null;
    }

}