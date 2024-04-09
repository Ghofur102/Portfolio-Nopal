<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\EducationsController;
use App\Http\Controllers\ExperiencesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ViewController::class, 'home'])->name('home');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [ViewController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'login_process'])->name('login.process');
    Route::post('/store-message', [MessageController::class, 'send_message'])->name('send.message');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [ViewController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::post('/update-about', [AboutController::class, 'update_about'])->name('update.about');

    Route::post('/store-experience', [ExperiencesController::class, 'store'])->name('store.experience');
    Route::post('/destroy-experience/{id}', [ExperiencesController::class, 'destroy'])->name('destroy.experience');

    Route::post('/store-education', [EducationsController::class, 'store'])->name('store.education');
    Route::post('/destroy-education/{id}', [EducationsController::class, 'destroy'])->name('destroy.education');

    Route::post('/store-project', [ProjectController::class, 'store'])->name('store.project');
    Route::post('/destroy-project/{id}', [ProjectController::class, 'destroy'])->name('destroy.project');

});
