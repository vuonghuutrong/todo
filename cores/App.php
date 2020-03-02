<?php

namespace Cores;

use Cores\DB;

class App
{
    private $route;
    private $params;

    public function __construct()
    {
        $this->params = [];
        if (isset($_GET['route'])) {
            $this->route = $_GET['route'];
        } else {
            $this->route = 'home';
        }
    }

    public function run()
    {
        $this->getRoute();
        new DB();
    }

    public function getRoute()
    {
        global $routes;
        
        if (isset($this->route)) {
            $found_route = '';
            $current_route = explode('/', trim($this->route, "/"));
            foreach ($routes as $key => $value) {
                $route = explode('/', trim($key, "/, ' '"));
                $is_same = $this->compareRoute($route, $current_route);
                if ($is_same) {
                    $found_route = $value;
                    break;
                }
            }

            if (empty($found_route)) {
                die('Route is not valid!');
            } else {
                $this->checkRouteType($found_route['type']);
                $this->goToController($found_route);
            }
        }
    }

    public function compareRoute($route_exploded, $current_route_exploded)
    {
        if (count($route_exploded) !== count($current_route_exploded)) {
            return false;
        }

        $found_route = true;
        for ($i = 0; $i < count($route_exploded); $i++) {
            if (isset($current_route_exploded[$i]) && ($route_exploded[$i] !== $current_route_exploded[$i] && $route_exploded[$i] != '*')) {
                $found_route = false;
                break;
            }
            $found_route = true;
            if ($route_exploded[$i] == '*') {
                $this->params[] = $current_route_exploded[$i];
            }
        }

        return $found_route;
    }

    public function checkRouteType($route_type)
    {
        $request_type = $_SERVER['REQUEST_METHOD'];
        if ($request_type !== $route_type) {
            die('The rotue do not support ' . $_SERVER['REQUEST_METHOD'] . ' method. Support ' . $route_type . ' method.');
        }
    }

    public function goToController($route)
    {
        if (file_exists('./controllers/' . $route['controller'] . '.php')) {
            require_once './controllers/' . $route['controller'] . '.php';
        } else {
            die('Controller "' . $route['controller'] .'" not found');
        }

        if (!isset($route['action']) || !method_exists($route['controller'], $route['action'])) {
            die('Action ' . $route['action'] . ' not found.');
        }

        $params = $this->params;
        if ($route['type'] === 'POST') {
            $params[] = $_POST;
        }

        call_user_func_array([$route['controller'], $route['action']], $params);
    }
}
