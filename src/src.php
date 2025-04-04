<?php

namespace App;

use App\Routes\Request;
use App\Routes\Route;

class src
{
    public function run()
    {
        $request = new Request();
        $router = new Route($request);
        $router->action();
    }

}
