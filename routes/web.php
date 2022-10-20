<?php

use App\Http\Controllers\ContestController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Route;


Route::get('/', [indexController::class, 'index'])->name('home');
Route::get('contest/{matche_id}', [ContestController::class, 'index'])->name('contest');
Route::get('wallet/transaction', [WalletController::class, 'transaction'])->name('wallet.transaction');



Route::get('register', function () {
    return view('register');
})->name('register');

Route::get('login', function () {
    return view('login');
})->name('login');

Route::get('player', function () {
    return view('player');
})->name('player');

Route::get('price_list', function () {
    return view('price_list');
})->name('price_list');

Route::get('wallet', function () {
    return view('wallet');
})->name('wallet');

Route::get('add_cash', function () {
    return view('add_cash');
})->name('add_cash');

Route::get('account', function () {
    return view('account');
})->name('account');


Route::get('game', function () {
    return view('game');
})->name('game');



Route::get('list', function () {
    return view('list');
})->name('list');
