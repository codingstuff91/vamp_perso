<?php

use App\Http\Controllers\AttributeCharacterUpdateController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\BackgroundController;
use App\Http\Controllers\Character\AttributeImprovementController;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\ChronicleController;
use App\Http\Controllers\CompulsionController;
use App\Http\Controllers\ConceptController;
use App\Http\Controllers\DescriptionController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\PowerImprovementController;
use App\Http\Controllers\ProfileController;
use App\Mail\UserRegistration;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->middleware(['auth', 'checkHome'])->name('home');

Route::get('/onboarding', function () {
    return Inertia::render('Onboarding');
})->middleware(['auth', 'verified'])->name('onboarding');

Route::middleware('auth')->group(function () {
    Route::resource('characters', CharacterController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/chronicles', [ChronicleController::class, 'index'])->name('chronicle.index');
    Route::get('/chronicles/create', [ChronicleController::class, 'create']);
    Route::post('/chronicles/{user}/select', [ChronicleController::class, 'select'])->name('chronicle.select');
    Route::post('/chronicles', [ChronicleController::class, 'store'])->name('chronicle.store');

    Route::post('descriptions/show', [DescriptionController::class, 'show']);

    Route::get('/character/{character}/attributes', [AttributeController::class, 'index']);
    Route::put('/character/{character}/attribute/{attribute}', AttributeCharacterUpdateController::class);
    Route::get('/character/{character}/concepts', [ConceptController::class, 'index']);
    Route::get('/character/{character}/backgrounds', [BackgroundController::class, 'index'])->name('backgrounds.index');
    Route::put('/character/{character}/experience', [ExperienceController::class, 'update'])->name('experience.update');

    Route::get('compulsions/{character}', [CompulsionController::class, 'associate'])->name('compulsions.associate');
    Route::delete('compulsions/{character}', [CompulsionController::class, 'destroy'])->name('compulsions.destroy');

    Route::get('experience', [ExperienceController::class, 'index'])->name('experience.index');

    // Character improvements routes
    Route::get('/character/{character}/attribute/{attribute}/improve', [AttributeImprovementController::class, 'index'])->name('attribute_improve.index');
    Route::put('/character/{character}/attribute/{attribute}/improve', [AttributeImprovementController::class, 'update'])->name('attribute_improve.update');

    // Power improvement routes
    Route::get('/character/{character}/powers', [PowerImprovementController::class, 'index'])->name('power_improve.index');
    Route::post('/character/{character}/power/{power}', [PowerImprovementController::class, 'store'])->name('power_improve.store');
    Route::get('/discipline/{discipline}/powers', [PowerImprovementController::class, 'getPowers'])->name('power_improve.getPowers');
});

Route::get('test_mail', function () {
    Mail::to('mattou2812@gmail.com')->send(new UserRegistration());
});

require __DIR__.'/auth.php';
