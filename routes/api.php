<?php

use App\Http\Controllers\Api\StatusController;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return new JsonResponse([
        'message' => 'Welcome to the API. Please check https://github.com/gmoigneu/upsun-project-status.',
    ]);
});

Route::get('/{project:project}/{environment:name}', [StatusController::class, 'show']);
Route::post('/', [StatusController::class, 'update']);
