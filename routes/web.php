<?php

use App\Http\Controllers\BankContractController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\InviteController;
use App\Http\Controllers\LawController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentEventController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\DivisionUserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WriterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard.index');
})->name('home');

Route::get('/test', function () {
    return Inertia\Inertia::render('pages/test');
});

Route::controller(SessionController::class)->name('session.')->group(function () {
    Route::get('/login', 'create')->middleware('guest')->name('create');
    Route::post('/login', 'store')->middleware('guest')->name('store');
    Route::delete('/logout', 'destroy')->middleware('auth')->name('destroy');

    Route::get('/select-division', 'selectDivisionGet')->middleware('auth')->name('select-division.get');
    Route::post('/select-division', 'selectDivisionPost')->middleware('auth')->name('select-division.post');
});

Route::resource('/users',                               UserController::class)->only(['create', 'store']);

Route::middleware(['auth', 'select-division'])->group(function () {
    Route::get('/dashboard',                            [DashboardController::class, 'index'])->name('dashboard.index');

    Route::resource('/divisions',                       DivisionController::class)->except(['show']);

    Route::resource('/writers',                         WriterController::class)->except(['show']);
    Route::resource('/bank-contracts',                  BankContractController::class)->except(['show']);
    Route::resource('/banks',                           BankController::class)->except(['show']);

    Route::resource('/laws',                            LawController::class)->except(['show']);
    Route::resource('/payments',                        PaymentController::class)->except(['show']);
    Route::resource('/payment-events',                  PaymentEventController::class)->except(['show']);

    Route::resource('/division.users',                  DivisionUserController::class)->except(['show']);
});

// Route::middleware('guest')->group(function () {
//     Route::get('/users/create/{token}', [UserController::class, 'create'])->name('users.create');
//     Route::post('/users', [UserController::class, 'store'])->name('users.store');
// });
