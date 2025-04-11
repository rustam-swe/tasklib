<?php

namespace App\Routes;

class Request
{
    public function url()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';

        $parsedUrl = parse_url($path);

        return $parsedUrl['path'] ?? '/';
    }

    public function method()
    {
      if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['_method'])){
        return strtolower($_POST['_method']);
      }

        $method = strtolower($_SERVER['REQUEST_METHOD']);

        return $method;
    }
}