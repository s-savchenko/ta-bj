<?php

$variables = require_once __DIR__ . '/../env-local.php';

foreach ($variables as $variable => $value) {
    putenv("$variable=$value");
}
