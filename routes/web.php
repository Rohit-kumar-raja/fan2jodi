<?php

use App\Http\Controllers\ContestController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SctrachCardController;
use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('clear-all', function () {
    $exitcode = Artisan::call('config:clear');
    $exitcode = Artisan::call('cache:clear');
    $exitcode = Artisan::call('route:clear');
    $exitcode = Artisan::call('view:clear');
    $exitcode = Artisan::call('config:cache');
    echo "Done";
});
Route::get('/', [indexController::class, 'index'])->name('home');
Route::get('contest/{matche_id}', [ContestController::class, 'index'])->name('contest');
Route::get('wallet/transaction', [WalletController::class, 'transaction'])->name('wallet.transaction');

// user management
Route::post('user/register', [LoginController::class, 'register'])->name('user.register');
Route::post('user/login', [LoginController::class, 'login'])->name('user.login');
// user management

Route::get('player/scratch/card/{contest_id}/contest/{matche_id}/matche/', [SctrachCardController::class, 'index'])->name('player.scratch');
Route::post('scratch', [SctrachCardController::class, 'sratch_card'])->name('player.scratch.card');



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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
