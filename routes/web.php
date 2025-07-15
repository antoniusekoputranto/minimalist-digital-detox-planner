<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetoxPlanController;
use App\Http\Controllers\OfflineActivityController;
use App\Http\Controllers\NotificationGuideController;

Route::get('/', function () {
    return view('welcome'); // Atau redirect ke dashboard jika sudah login
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DetoxPlanController::class, 'index'])->name('dashboard');

    // Routes untuk DetoxPlan
    Route::get('/detox-plans/create', [DetoxPlanController::class, 'create'])->name('detox-plans.create');
    Route::post('/detox-plans', [DetoxPlanController::class, 'store'])->name('detox-plans.store');
    Route::get('/detox-plans/{detoxPlan}/edit', [DetoxPlanController::class, 'edit'])->name('detox-plans.edit');
    Route::put('/detox-plans/{detoxPlan}', [DetoxPlanController::class, 'update'])->name('detox-plans.update');
    Route::delete('/detox-plans/{detoxPlan}', [DetoxPlanController::class, 'destroy'])->name('detox-plans.destroy');
    Route::get('/detox-plans/{detoxPlan}', [DetoxPlanController::class, 'show'])->name('detox-plans.show');


    // Routes untuk OfflineActivity
    Route::post('/detox-plans/{detoxPlan}/activities', [OfflineActivityController::class, 'store'])->name('offline-activities.store');
    Route::put('/offline-activities/{offlineActivity}', [OfflineActivityController::class, 'update'])->name('offline-activities.update');
    Route::delete('/offline-activities/{offlineActivity}', [OfflineActivityController::class, 'destroy'])->name('offline-activities.destroy');

    // Routes untuk NotificationGuide
    Route::get('/notification-guides', [NotificationGuideController::class, 'index'])->name('notification-guides.index');
    Route::get('/notification-guides/{notificationGuide}', [NotificationGuideController::class, 'show'])->name('notification-guides.show');
    // Admin bisa CRUD NotificationGuide, tapi untuk user hanya view
});


Route::resource('notification-guides', NotificationGuideController::class);


require __DIR__.'/auth.php';
