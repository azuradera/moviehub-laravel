<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FilmApiController;

Route::apiResource('films', FilmApiController::class);