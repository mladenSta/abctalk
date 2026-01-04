<?php

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('topics', [App\Http\Controllers\TopicController::class, 'index'])->name('topics');
    Route::get('topics/create', [App\Http\Controllers\TopicController::class, 'create'])->name('topics.create');
    Route::post('topics', [App\Http\Controllers\TopicController::class, 'store'])->name('topics.store');

    Route::get('messages/{topic_id}', [App\Http\Controllers\MessageController::class, 'index'])->name('messages');
    Route::post('messages', [App\Http\Controllers\MessageController::class, 'store'])->name('messages.store');

});
