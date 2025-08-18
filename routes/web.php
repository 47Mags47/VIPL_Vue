<?php

use App\Http\Controllers\BankContractController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::controller(SessionController::class)->name('session.')->group(function(){
    Route::get('/login', 'create')->middleware('guest')->name('create');
    Route::post('/login', 'store')->middleware('guest')->name('store');
});

Route::resource('bank-contracts', BankContractController::class);

Route::get('/test', function(){
    dump(user()->hasPermission('bank_contract-viewAny'));
})->name('test');
