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

    // Route::get('/creators', 'UserController@index');
    Route::get('/genres', 'GenreController@index');
    
    Route::prefix('visual_novels')->group(function () {
        Route::get('/', 'VisualNovelController@index')->name('visual_novels.index');
        Route::get('/to-json', 'VisualNovelController@toJson');
        Route::post('/', 'VisualNovelController@store')->name('visual_novels.store');
        Route::put('/{visual_novel}', 'VisualNovelController@update')->name('visual_novels.update');
        Route::delete('/{visual_novel}', 'VisualNovelController@destroy')->name('visual_novels.destroy');
        Route::get('/{visual_novel}/edit', 'VisualNovelController@edit')->name('visual_novels.edit');

        
        Route::get('/{visual_novel}/characters', 'VisualNovelCharacterController@show')->name('visual_novel_characters.show');
    });

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
        Route::get('{game}/menu', 'GameController@menu')->name('game.menu');
        // Route::get('/play', 'games.play')->name('game.play');
        
    });

});

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login.index');
Route::post('/login', 'Auth\LoginController@login')->name('login.store');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
