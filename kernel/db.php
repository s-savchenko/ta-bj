<?php

use Illuminate\Database\Capsule\Manager;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

$capsule = new Manager();

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'homestead',
    'username'  => 'homestead',
    'password'  => 'secret',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);
$capsule->setEventDispatcher(new Dispatcher(new Container));
$capsule->setAsGlobal();
$capsule->bootEloquent();
