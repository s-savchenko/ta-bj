<?php

use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\Schema\Blueprint;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../kernel/db.php';

Manager::schema()->dropIfExists('tasks');

Manager::schema()->create('tasks', function (Blueprint $table) {
    $table->bigIncrements('id');
    $table->timestamps();
    $table->string('user_name');
    $table->string('email');
    $table->text('content');
});
