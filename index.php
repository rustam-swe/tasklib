<?php
declare(strict_types=1);

require "vendor/autoload.php";
require "web.php";
require "src/Helpers/helpers.php";

$src = new \App\src();
$src->run();
