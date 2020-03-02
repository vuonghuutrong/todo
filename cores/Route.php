<?php

namespace Cores;

class Route
{
    public static function get($url, $action)
    {
        self::addRoute('GET', $url, $action);
    }

    public static function post($url, $action)
    {
        self::addRoute('POST', $url, $action);
    }

    public static function put($url, $action)
    {
        //update later
    }

    public static function delete($url, $action)
    {
        //update later
    }

    public static function addRoute($type, $url, $action)
    {
        global $routes;
        
        if ($url !== '') {
            self::checkRouteValid($url, $action);
        }
        else {
            $url = 'home';
        }

        $url_convert = preg_replace('/(\{.*?\})/', '*', $url);
        $route_action = explode('@', $action);
        $routes[$url_convert] = ['type' => $type, 'controller' => $route_action[0], 'action' => $route_action[1]];
    }

    private static function checkRouteValid($url, $action)
    {
        if (!preg_match("/^[a-zA-Z0-9_-{}\/]+$/", $url)) {
            die('Route "' . $url . '" is not valid');
        }
        if (!preg_match("/^[a-zA-Z0-9_]+@[a-zA-Z0-9_]+$/", $action)) {
            die('Action of route "' . $url . '" is not valid');
        }
    }
}
