<?php

use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\MuscleController;
use App\Http\Controllers\Api\SaranController;
use App\Http\Controllers\Api\ScheduleController;
use App\Http\Controllers\Api\WorkoutController;
use Illuminate\Support\Facades\Route;

Route::get('/muscles', [MuscleController::class, 'index']);
Route::get('/muscles/{slug}', [MuscleController::class, 'show']);

Route::get('/workouts/{slug}', [WorkoutController::class, 'show']);

Route::get('/schedules', [ScheduleController::class, 'index']);
Route::get('/schedules/{slug}', [ScheduleController::class, 'show']);

Route::get('/faq', [FaqController::class, 'index']);

Route::middleware('throttle:saran')->post('/saran', [SaranController::class, 'store']);
