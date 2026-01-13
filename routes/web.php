<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\HeroSlideController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\FileUploadController;
use App\Http\Controllers\Admin\GoalController;
use App\Http\Controllers\Admin\LeaderController;
use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\MessageController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'submitContact'])->name('contact.submit');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('hero-slides', HeroSlideController::class);
    Route::resource('activities', ActivityController::class);
    Route::get('content', [ContentController::class, 'index'])->name('content.index');
    Route::post('content', [ContentController::class, 'update'])->name('content.update');
    Route::get('goals', [GoalController::class, 'index'])->name('goals.index');
    Route::post('goals', [GoalController::class, 'update'])->name('goals.update');
    Route::get('leader', [LeaderController::class, 'index'])->name('leader.index');
    Route::post('leader', [LeaderController::class, 'update'])->name('leader.update');
    Route::post('upload-about-logo', [FileUploadController::class, 'uploadAboutLogo'])->name('upload.about.logo');
    
    // About Page Management
    Route::get('about', [AboutController::class, 'index'])->name('about.index');
    Route::post('about', [AboutController::class, 'update'])->name('about.update');
    Route::post('about/timeline', [AboutController::class, 'updateTimeline'])->name('about.timeline');
    Route::post('about/visions', [AboutController::class, 'updateVisions'])->name('about.visions');

    // Messages Management
    Route::get('messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('messages/export-csv', [MessageController::class, 'exportCsv'])->name('messages.export-csv');
    Route::get('messages/export-pdf', [MessageController::class, 'exportPdf'])->name('messages.export-pdf');
    Route::get('messages/{message}', [MessageController::class, 'show'])->name('messages.show');
    Route::delete('messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
    Route::post('messages/{message}/mark-read', [MessageController::class, 'markAsRead'])->name('messages.mark-read');
    Route::post('messages/mark-all-read', [MessageController::class, 'markAllAsRead'])->name('messages.mark-all-read');
});
