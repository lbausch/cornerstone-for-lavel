<?php

use Bausch\LaravelCornerstone\Http\Controllers\KeepAliveController;

$router->get('lbausch/laravel-cornerstone/keepalive', KeepAliveController::class.'@keepalive');
