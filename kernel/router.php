<?php

use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;

return
    simpleDispatcher(function (RouteCollector $r) {
        $routes = include __DIR__ . '/../routes/web.php';
        foreach ($routes as $route) {
            $method = $route[0];
            $path = ltrim(rtrim($route[1], '/'), '/');
            $handler = $route[2];
            $r->addRoute($method, '/' . $path, $handler);
        }
    });
