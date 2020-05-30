<?php

use DI\ContainerBuilder;
use Jenssegers\Blade\Blade;
use Kernel\Template\BladeRender;
use Kernel\Template\RenderInterface;
use Laminas\Diactoros\ResponseFactory;
use Laminas\Diactoros\ServerRequestFactory;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions([
    ServerRequestInterface::class => fn () => ServerRequestFactory::fromGlobals(),
    ResponseInterface::class => fn () => (new ResponseFactory())->createResponse(),
    RenderInterface::class => function () {
        $blade = new Blade(__DIR__ . '/../app/views/', __DIR__ . '/../cache/views/');
        return new BladeRender($blade);
    }
]);

return $containerBuilder->build();
