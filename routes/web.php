<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\User\EventController as UserEventController;
use App\Http\Controllers\Admin\HistoriesController;
use App\Http\Controllers\Admin\TiketController;
use App\Http\Controllers\Admin\PaymentTypeController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\TicketTypeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\OrderController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Debug route
Route::get('/test-locations-all', function() {
    return [
        'all' => \App\Models\Location::all()->map(fn($l) => [
            'id' => $l->id,
            'nama' => $l->nama,
            'is_active' => $l->is_active,
            'is_active_type' => gettype($l->is_active),
            'is_active_value' => var_export($l->is_active, true)
        ]),
        'active_y' => \App\Models\Location::where('is_active', 'Y')->get()->map(fn($l) => ['id' => $l->id, 'nama' => $l->nama]),
        'active_true' => \App\Models\Location::where('is_active', true)->get()->map(fn($l) => ['id' => $l->id, 'nama' => $l->nama]),
        'active_1' => \App\Models\Location::where('is_active', 1)->get()->map(fn($l) => ['id' => $l->id, 'nama' => $l->nama]),
    ];
});

// Events
Route::get('/events/{event}', [UserEventController::class, 'show'])->name('events.show');

// Order
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    
        Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // Category Management
        Route::resource('categories', CategoryController::class);

        // Event Management
        Route::resource('events', AdminEventController::class);

        // Tiket Management 
        Route::resource('tickets', TiketController::class);
        
        // Payment Type Management
        Route::resource('payment-types', PaymentTypeController::class);
        Route::get('/payment-types/trashed', [PaymentTypeController::class, 'trashed'])->name('payment-types.trashed');
        Route::patch('/payment-types/{id}/restore', [PaymentTypeController::class, 'restore'])->name('payment-types.restore');
        Route::delete('/payment-types/{id}/force-delete', [PaymentTypeController::class, 'forceDelete'])->name('payment-types.forceDelete');
        
        // Location Management
        Route::get('/locations/trashed', [LocationController::class, 'trashed'])->name('locations.trashed');
        Route::patch('/locations/{id}/restore', [LocationController::class, 'restore'])->name('locations.restore');
        Route::delete('/locations/{id}/force-delete', [LocationController::class, 'forceDelete'])->name('locations.forceDelete');
        Route::resource('locations', LocationController::class);
        
        // Ticket Type Management
        Route::resource('ticket-types', TicketTypeController::class);
        
        // Histories
        Route::get('/histories', [HistoriesController::class, 'index'])->name('histories.index');
        Route::get('/histories/{id}', [HistoriesController::class, 'show'])->name('histories.show');
    });
});

require __DIR__.'/auth.php';