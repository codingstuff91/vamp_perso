<?php

use App\Http\Controllers\AttributeCharacterUpdateController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\ChronicleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('characters', CharacterController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/chronicles', [ChronicleController::class, 'index'])->name('chronicle.index');
    Route::get('/chronicles/create', [ChronicleController::class, 'create']);
    Route::post('/chronicles/{user}/select', [ChronicleController::class, 'select'])->name('chronicle.select');
    Route::post('/chronicles', [ChronicleController::class, 'store'])->name('chronicle.store');
});

Route::get('/character/{character}/attributes', [AttributeController::class, "index"]);
Route::patch('/character/{character}/attribute/{attribute}', AttributeCharacterUpdateController::class);

require __DIR__.'/auth.php';
