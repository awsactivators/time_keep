<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskSessionController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Project and Task Routes
    Route::resource('projects', ProjectController::class);
    Route::resource('tasks', TaskController::class);
});



Route::prefix('tasks/{task}/sessions')->group(function () {
    Route::get('/', [TaskSessionController::class, 'index'])->name('task-sessions.index');
    Route::get('/create', [TaskSessionController::class, 'create'])->name('task-sessions.create');
    Route::post('/', [TaskSessionController::class, 'store'])->name('task-sessions.store');
    Route::get('/{session}/edit', [TaskSessionController::class, 'edit'])->name('task-sessions.edit');
    Route::put('/{session}', [TaskSessionController::class, 'update'])->name('task-sessions.update');
    Route::delete('/{session}', [TaskSessionController::class, 'destroy'])->name('task-sessions.destroy');
});



require __DIR__.'/auth.php';
