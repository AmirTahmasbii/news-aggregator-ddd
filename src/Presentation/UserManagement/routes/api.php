<?php

declare(strict_types=1);

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Presentation\UserManagement\Controllers\UserController;

Route::controller(UserController::class)->group(function () {
    Route::post('/register', 'register');
});
