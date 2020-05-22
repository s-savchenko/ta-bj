<?php

use DI\ContainerBuilder;
use Laminas\Diactoros\ResponseFactory;
use Laminas\Diactoros\ServerRequestFactory;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions([
    ServerRequestInterface::class => fn () => ServerRequestFactory::fromGlobals(),
    ResponseInterface::class => fn () => (new ResponseFactory())->createResponse(),
]);

return $containerBuilder->build();
