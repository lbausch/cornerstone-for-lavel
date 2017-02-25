<?php

use Bausch\LaravelCornerstone\Http\Controllers\KeepAliveController;

Route::get('lbausch/laravel-cornerstone/keepalive', KeepAliveController::class.'@keepalive');
