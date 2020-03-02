<?php
namespace Cores;

class View
{
    public static function make($view, $data = [])
    {
        if (file_exists('./views/' . $view . '.php')) {
            if (file_exists('./views/layouts/layout.php')) {
                require_once('./views/layouts/layout.php');
            }
            else {
                die('The layout is not exist');
            }
        }
        else {
            die('The view "' . $view .'" is not exist');
        }
    }
}