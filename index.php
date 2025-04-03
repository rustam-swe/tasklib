<?php
declare(strict_types=1);

require "vendor/autoload.php";
require "web.php";
require "resource//views/login.php";
// require "resource//views/register.php";
$src = new \App\src();
$src->run(); 
