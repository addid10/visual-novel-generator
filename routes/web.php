<?php

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
Route::group([ 'middleware' => ['auth','role:creator']], function () {
    
    Route::view('/visual_novels', 'visual_novels.index')->name('visual_novels.index');

    Route::view('/stories', 'stories.index')->name('stories.index');

    Route::prefix('assets')->group(function () {
        

        Route::view('/characters', 'characters.index')->name('characters.index');

        Route::view('/backgrounds', 'backgrounds.index')->name('backgrounds.index');

        Route::view('/musics', 'musics.index')->name('musics.index');   
    });
});

Route::group([ 'middleware' => ['auth','role:creator&guest star']], function () {

    Route::view('/', 'index')->name('dashboard.index');



    

    Route::prefix('game')->group(function () {
        Route::get('/', 'GameController@index')->name('game.index');
        Route::view('/menu', 'games.menu')->name('game.menu');
        Route::view('/play', 'games.play')->name('game.play');
        
    });
});

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login.index');
Route::post('/login', 'Auth\LoginController@login')->name('login.store');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
