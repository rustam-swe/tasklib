<?php

namespace src;

use src\Routes\Request;
use src\Routes\Route;

class src
{
    public function run()
    {
        $request = new Request();
        $router = new Route($request);
        $router->action();
    }

    public function logout()
    {
        //This is necessary for authorization
    }
}
