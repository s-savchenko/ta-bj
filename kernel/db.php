<?php

use Illuminate\Database\Capsule\Manager;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

$capsule = new Manager();

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => getenv('db_host'),
    'database'  => getenv('db_name'),
    'username'  => getenv('db_username'),
    'password'  => getenv('db_password'),
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);
$capsule->setEventDispatcher(new Dispatcher(new Container));
$capsule->setAsGlobal();
$capsule->bootEloquent();
