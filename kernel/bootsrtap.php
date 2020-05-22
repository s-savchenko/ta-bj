<?php

use Psr\Container\ContainerInterface;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/errorHandler.php';

/** @var ContainerInterface $container */
$container = require __DIR__ . '/di.php';
