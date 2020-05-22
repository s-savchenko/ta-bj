<?php

use App\Controllers\MainPageController;

return [
    ['GET', '/', [MainPageController::class, 'index']]
];
