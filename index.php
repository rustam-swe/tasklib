<?php
declare(strict_types=1);

require "vendor/autoload.php";
require "web.php";

use App\Routes\Request;
use App\Routes\Route;

$request = new Request();
$route = new Route($request);
$route->action();
