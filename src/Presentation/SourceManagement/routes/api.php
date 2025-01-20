<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Presentation\SourceManagement\Controllers\SourceController;

Route::prefix('/sources')->controller(SourceController::class)->group(function () {
    Route::get('/', 'index');
})->middleware('auth:sanctum');
