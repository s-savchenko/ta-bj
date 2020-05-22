<?php

use Middlewares\FastRoute;
use Middlewares\RequestHandler;
use Middlewares\TrailingSlash;

$middlewareQueue = [];

$middlewareQueue[] = new TrailingSlash();
$middlewareQueue[] = new FastRoute(require __DIR__ . '/router.php');
$middlewareQueue[] = new RequestHandler(require __DIR__ . '/di.php');

return $middlewareQueue;
