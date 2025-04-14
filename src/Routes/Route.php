<?php

namespace App\Routes;

class Route
{
    public $request;
    public static array $routes = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public static function get($path, $action)
    {
        self::$routes['get'][$path] = $action;
    }

    public static function post($path, $action)
    {
        self::$routes['post'][$path] = $action;
    }

    public static function delete($path, $action)
    {
      if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['_method'] === 'delete'){
      
        self::$routes['delete'][$path] = $action;
      }
    }

    public function action()
    {
        $path = $this->request->url();
        $method = $this->request->method();
        $routes = self::$routes[$method] ?? [];
        // if ($action == false) {
        //   header('location: /404');
        // }

        foreach ($routes as $route => $action) {
            $pattern = preg_replace('/\{(\w+)\}/', '(\w+)', $route);
            $pattern = "#^" . $pattern . "$#";

            if (preg_match($pattern, $path, $matches)) {
              array_shift($matches); // remove full match

                if (is_array($action)) {
                  $controller = new $action[0];
                    $controller->{$action[1]}(...$matches);

                    return;
                }
            }
        }

        header('location: /404');
    }
}