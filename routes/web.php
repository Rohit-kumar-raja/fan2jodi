<?php

use App\Http\Controllers\ApiUpdaterController;
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
Route::get('contest/{matche_id}', [ContestController::class, 'index'])->name('contest')->middleware('auth');
Route::get('my/contest', [ContestController::class, 'my_contest'])->name('contest.my')->middleware('auth');
Route::get('my/contest/details/{contest_id}', [ContestController::class, 'my_contest_details'])->name('contest.my.details')->middleware('auth');

Route::get('wallet/transaction', [WalletController::class, 'transaction'])->name('wallet.transaction')->middleware('auth');
Route::get('wallet', [WalletController::class, 'walletList'])->name('wallet')->middleware('auth');

// user management
Route::post('user/register', [LoginController::class, 'register'])->name('user.register');
Route::get('prikpay-response', [WalletController::class, 'paymentGatewayRespone'])->middleware('auth');
Route::post('user/login', [LoginController::class, 'login'])->name('user.login');
Route::post('deposit-amount', [WalletController::class, 'depositAmount'])->name('deposit.amount');
Route::post('withdraw-request', [WalletController::class, 'withdrawRequest'])->name('withdraw-request');
// user management

Route::get('player/scratch/card/{contest_id}/contest/{matche_id}/matche/', [SctrachCardController::class, 'index'])->name('player.scratch')->middleware('auth');
Route::post('scratch', [SctrachCardController::class, 'sratch_card'])->name('player.scratch.card')->middleware('auth');
Route::post('update-profile', [indexController::class, 'updateProfile'])->middleware('auth');
Route::post('update-user-profile', [indexController::class, 'updateUserProfile'])->middleware('auth');
Route::get('matches/api/update', [ApiUpdaterController::class, 'index'])->name('api.updater');





Route::get('price_list', function () {
    return view('price_list');
})->name('price_list');

// Route::get('wallet', function () {
//     return view('wallet');
// })->name('wallet');

Route::get('add_cash', function () {
    return view('add_cash');
})->name('add_cash')->middleware('auth');;
Route::get('withdraw', [WalletController::class,'withdraw'])->name('withdraw')->middleware('auth');;

Route::get('account', function () {
    return view('account');
})->name('account')->middleware('auth');;


Route::get('game', function () {
    return view('game');
})->name('game');

Route::get('list', function () {
    return view('list');
})->name('list');




require __DIR__ . '/auth.php';
