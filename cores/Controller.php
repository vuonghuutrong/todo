<?php

namespace Cores;

class Controller
{
    public function redirect($route)
    {
        header('Location: ' . $route);
        exit();
    }
}
