<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Presentation\PreferenceManagement\Controllers\PreferenceController;

Route::prefix('/preferences')->middleware('auth:sanctum')->controller(PreferenceController::class)->group(function () {
    Route::post('/', 'create');
    Route::get('/', 'show');
});
