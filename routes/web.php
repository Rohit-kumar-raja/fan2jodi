<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('register', function() {
    return view('register');})->name('register');
    
Route::get('login', function() {
    return view('login');})->name('login');
    
Route::get('player', function() {
    return view('player');})->name('player');

Route::get('price_list', function() {
    return view('price_list');})->name('price_list');

Route::get('wallet', function() {
    return view('wallet');})->name('wallet');

Route::get('add_cash', function() {
    return view('add_cash');})->name('add_cash');

Route::get('account', function() {
    return view('account');})->name('account');

Route::get('contest', function() {
    return view('contest');})->name('contest');

Route::get('game', function() {
    return view('game');})->name('game');

Route::get('/', function() {
    return view('battle');})->name('home');
        
Route::get('list', function() {
    return view('list');})->name('list');

