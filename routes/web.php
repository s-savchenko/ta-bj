<?php

use App\Controllers\AddTaskController;
use App\Controllers\MainPageController;

return [
    ['GET', '/', [MainPageController::class, 'index']],
    ['GET', '/add-task', [AddTaskController::class, 'index']],
    ['POST', '/add-task', [AddTaskController::class, 'store']]
];
