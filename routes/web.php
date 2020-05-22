<?php

use App\Controllers\TaskController;
use App\Controllers\LoginController;
use App\Controllers\MainPageController;

return [
    ['GET', '/', [MainPageController::class, 'index']],
    ['GET', '/add-task', [TaskController::class, 'create']],
    ['POST', '/add-task', [TaskController::class, 'store']],
    ['GET', '/login', [LoginController::class, 'index']],
    ['POST', '/login', [LoginController::class, 'login']],
    ['GET', '/logout', [LoginController::class, 'logout']],
    ['GET', '/edit-task', [TaskController::class, 'edit']],
    ['POST', '/edit-task', [TaskController::class, 'update']],
];
