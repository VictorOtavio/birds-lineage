<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::prefix('/breeding')->as('breeding:')->group(function () {
        Route::resource('pairs', 'PairsController');
    });
    Route::prefix('/birds')->as('birds:')->group(function () {
        Route::resource('', 'BirdsController');
    });
    Route::get('/genealogy', 'DashboardController@index')->name('genealogy');
    Route::prefix('/repertories')->as('repertories:')->group(function () {
        Route::resource('cages', 'CagesController');
    });
    Route::get('/follow-up', 'DashboardController@index')->name('follow-up');
    Route::get('/funds', 'DashboardController@index')->name('funds');
    Route::get('/miscellaneous', 'DashboardController@index')->name('miscellaneous');
    Route::get('/sources', 'DashboardController@index')->name('sources');
    Route::get('/hand-feeding', 'DashboardController@index')->name('hand-feeding');
});
