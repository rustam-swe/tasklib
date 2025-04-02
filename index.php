<?php
declare(strict_types=1);

require "vendor/autoload.php";
require "web.php";

use src\src;

$src = new src();
$src->run(); 
