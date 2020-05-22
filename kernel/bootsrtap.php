<?php

use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Relay\Relay;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/errorHandler.php';

session_start();

/** @var ContainerInterface $container */
$container = require __DIR__ . '/di.php';

require_once __DIR__ . '/db.php';

$requestHandler = new Relay(require __DIR__ . '/middleware.php');
$response = $requestHandler->handle($container->get(ServerRequestInterface::class));

$emiter = new SapiEmitter();
$emiter->emit($response);
