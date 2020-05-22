<?php

use DI\ContainerBuilder;
use Jenssegers\Blade\Blade;
use Laminas\Diactoros\ResponseFactory;
use Laminas\Diactoros\ServerRequestFactory;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions([
    ServerRequestInterface::class => fn () => ServerRequestFactory::fromGlobals(),
    ResponseInterface::class => fn () => (new ResponseFactory())->createResponse(),
    Blade::class => fn () => new Blade(__DIR__ . '/../app/views/', __DIR__ . '/../cache/views/')
]);

return $containerBuilder->build();
