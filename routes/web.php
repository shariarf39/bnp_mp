<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\HeroSlideController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\GoalController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'submitContact'])->name('contact.submit');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('hero-slides', HeroSlideController::class);
    Route::get('content', [ContentController::class, 'index'])->name('content.index');
    Route::post('content', [ContentController::class, 'update'])->name('content.update');
    Route::get('goals', [GoalController::class, 'index'])->name('goals.index');
    Route::post('goals', [GoalController::class, 'update'])->name('goals.update');
});
