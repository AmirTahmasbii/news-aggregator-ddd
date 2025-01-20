<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Presentation\ArticleManagement\Controllers\ArticleController;

Route::prefix('/articles')->middleware('auth:sanctum')->controller(ArticleController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{article}', 'show');
});
