<?php

use Cores\App;

global $routes;

require_once './cores/autoload.php';

require_once './routes.php';

$app = new App();
$app->run();
