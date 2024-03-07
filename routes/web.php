<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\Evenement1Controller;
use App\Http\Controllers\Category1Controller;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/userdash', function () {
    return view('user');
})->middleware(['auth', 'verified'])->name('userdash');

Route::get('/organdash', function () {
    return view('organisateure');
})->middleware(['auth', 'verified'])->name('organdash');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
// Route::get('/evenements.index', [EvenementController::class, 'index'])->name('evenements.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('evenements',Evenement1Controller::class);
    // Route::resource('categories1', Category1Controller::class);
    // Route::get('/evenements/{evenement}/reservations-statistics', [EvenementController::class, 'showReservationsStatistics'])->name('evenements.reservations-statistics');
    // Route::get('/evenements/reservations_statistics', [EvenementController::class, 'reservationsStatistics'])->name('evenements.reservations_statistics');
    // Route::get('/evenements/reservations_statistics', [EvenementController::class, 'reservationsStatistics'])->name('evenements.reservations_statistics');
// In your routes/web.php file

Route::get('/evenements/{evenement}/reservations_statistics', [Evenement1Controller::class, 'showReservationsStatistics'])->name('evenements.show_reservations_statistics');

    Route::get('/categories/statistics', [Category1Controller::class, 'statistics'])->name('categories.statistics');
    Route::resource('categories', Category1Controller::class);

    
});
Route::middleware(['auth', 'role:organisateure'])->group(function () {
    // ... other routes

    Route::get('/reservations-statistics', [Evenement1Controller::class, 'showReservationsStatistics'])
        ->name('evenements.reservations_statistics');
        Route::get('/evenements', [Evenement1Controller::class, 'display'])->name('evenements.display');

});
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users/{user}/switch-role', [UserController::class, 'switchRole'])->name('users.switchRole');
    Route::delete('/users/{user}/soft-delete', [UserController::class, 'softDelete'])->name('users.softDelete');
});

require __DIR__.'/auth.php';
