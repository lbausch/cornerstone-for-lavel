<?php

use Bausch\LaravelCornerstone\Http\Controllers\KeepAliveController;

Route::get('bausch/laravel-cornerstone/keepalive', KeepAliveController::class.'@keepalive');
