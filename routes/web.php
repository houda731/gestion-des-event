<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ReservationController;

// Public routes
Route::get('/', [EventController::class, 'publicIndex'])->name('home');
Route::get('/evenements/{event}', [EventController::class, 'publicShow'])->name('events.show');
Route::get('/evenements/{event}/reserver', [ReservationController::class, 'create'])->name('reservations.create');
Route::post('/evenements/{event}/reserver', [ReservationController::class, 'store'])->name('reservations.store');

// Admin authentication
Route::get('/admin/connexion', [AdminAuthController::class, 'showLoginForm'])->name('admin.login.show');
Route::post('/admin/connexion', [AdminAuthController::class, 'login'])->name('admin.login');
Route::post('/admin/deconnexion', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Admin routes protected by middleware
Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::get('/evenements', [EventController::class, 'index'])->name('events.index');
    Route::get('/evenements/creer', [EventController::class, 'create'])->name('events.create');
    Route::post('/evenements', [EventController::class, 'store'])->name('events.store');
    Route::get('/evenements/{event}/modifier', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/evenements/{event}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/evenements/{event}', [EventController::class, 'destroy'])->name('events.destroy');

    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
});
