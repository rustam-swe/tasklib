<?php

namespace App\Routes;

class Route
{
    public static array $routes = [];

    public function __construct(public Request $request)
    {
    }

    public static function get(string $path, array $action)
    {
      self::$routes['get'][$path] = $action;
    }

    public static function post($path, $action)
    {
        self::$routes['post'][$path] = $action;
    }

    public function action()
    {
        $path   = $this->request->url();
        $method = $this->request->method();
        $action = self::$routes[$method][$path] ?? false;

        if ($action == false) {
            header('location: /404');
        }


        if (is_array($action)) {
            $controller = new $action[0]; 

            $controller->{$action[1]}();
        }
    }

    public function getResourseId(string $route): false|string
    {
        $resourseIndex = mb_stripos($route, '{id}');
        
        if (!$resourseIndex) {
            return false;
        }

        $resourseValue = substr($route, $resourseIndex);

        if ($limit = mb_stripos($resourseValue, '/')) {
            return substr($resourseValue, 0, $limit);
        }

        return $resourseValue ?: false;
    }
}
