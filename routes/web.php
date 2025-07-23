<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DetoxPlanController;
use App\Http\Controllers\OfflineActivityController;
use App\Http\Controllers\NotificationGuideController;

Route::get('/', function () {
    return view('welcome'); // Atau redirect ke dashboard jika sudah login
});

Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DetoxPlanController::class, 'index'])->name('dashboard');

    // Routes untuk DetoxPlan
    Route::get('/detox-plans/create', [DetoxPlanController::class, 'create'])->name('detox-plans.create');
    Route::post('/detox-plans', [DetoxPlanController::class, 'store'])->name('detox-plans.store');
    Route::get('/detox-plans/{detoxPlan}/edit', [DetoxPlanController::class, 'edit'])->name('detox-plans.edit');
    Route::put('/detox-plans/{detoxPlan}', [DetoxPlanController::class, 'update'])->name('detox-plans.update');
    Route::delete('/detox-plans/{detoxPlan}', [DetoxPlanController::class, 'destroy'])->name('detox-plans.destroy');
    Route::get('/detox-plans/{detoxPlan}', [DetoxPlanController::class, 'show'])->name('detox-plans.show');

    // Full resource routes untuk OfflineActivity
    Route::resource('offline-activities', OfflineActivityController::class);

    // Routes untuk NotificationGuide (hanya view untuk user biasa)
    Route::get('/notification-guides', [NotificationGuideController::class, 'index'])->name('notification-guides.index');
    Route::get('/notification-guides/{notificationGuide}', [NotificationGuideController::class, 'show'])->name('notification-guides.show');

    // Routes untuk Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Jika ingin memberikan akses CRUD penuh untuk NotificationGuide (misalnya untuk admin)
Route::middleware(['auth', 'can:manage-notification-guides'])->group(function () {
    Route::resource('notification-guides', NotificationGuideController::class)->except(['index', 'show']);
});

require __DIR__.'/auth.php';
