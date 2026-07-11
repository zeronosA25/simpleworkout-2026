<?php

use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MuscleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SaranController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\WorkoutController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/otot/{slug}', [MuscleController::class, 'show'])->name('muscle.show');

Route::get('/gerakan/{slug}', [WorkoutController::class, 'show'])->name('workout.show');

Route::get('/jadwal', [ScheduleController::class, 'index'])->name('schedules.index');
Route::get('/jadwal/{slug}', [ScheduleController::class, 'show'])->name('schedules.show');
Route::post('/jadwal/toggle', [ScheduleController::class, 'toggleChecklist'])
    ->middleware('auth')
    ->name('schedules.toggle');

Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');

Route::middleware('throttle:saran')->group(function () {
    Route::post('/saran', [SaranController::class, 'store'])->name('saran.store');
});

require __DIR__.'/auth.php';
