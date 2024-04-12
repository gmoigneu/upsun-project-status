<?php

use App\Http\Controllers\Api\StatusController;
use Illuminate\Support\Facades\Route;

Route::get('/{project:project}/{environment:name}', [StatusController::class, 'show']);
Route::post('/', [StatusController::class, 'update']);
