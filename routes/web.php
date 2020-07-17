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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('/balance', 'BalanceController')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/inicio', function () {
    return view('Games.BlackJack.index');
})->middleware('auth');

Route::get('/Recargar', function () {
    return view('Recharge', ['isGame' => false]);
})->middleware('auth');

Route::get('/BlackJack', function () {
    return view('Games.BlackJack.index', ['isGame' => true]);
})->middleware('auth');

Route::get('/Craps', function () {
    return view('Games.Craps.index', ['isGame' => true]);
})->middleware('auth');

Route::get('/Poker', function () {
    return view('Games.Poker.index', ['isGame' => true]);
})->middleware('auth');

Route::get('/Roulette', function () {
    return view('Games.Roulette.index', ['isGame' => true]);
})->middleware('auth');

Route::get('/SlotMachine', function () {
    return view('Games.SlotMachine.index', ['isGame' => true]);
})->middleware('auth');

Route::get('/juegoPrueba', function () {
    return view('Games.JuegoPrueba.index', ['isGame' => true]);
})->middleware('auth');

Route::post('/GetGame', 'BalanceController@ajaxRequestPost');

Route::post('/InsertGame', 'BalanceController@ajaxRequestInsert');