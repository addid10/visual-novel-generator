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
        Route::post('/', 'VisualNovelController@store')->name('visual_novels.store');
        Route::put('/{visual_novel}', 'VisualNovelController@update')->name('visual_novels.update');
        Route::delete('/{visual_novel}', 'VisualNovelController@destroy')->name('visual_novels.destroy');
        Route::get('/{visual_novel}/edit', 'VisualNovelController@edit')->name('visual_novels.edit');

        Route::get('/iseng', 'VisualNovelCharacterController@iseng')->name('visual_novel_characters.iseng');
        Route::post('/characters', 'VisualNovelCharacterController@store')->name('visual_novel_characters.store');
        Route::delete('/characters/{character}', 'VisualNovelCharacterController@destroy')->name('visual_novel_characters.destroy');
        Route::get('/{visual_novel}/characters', 'VisualNovelCharacterController@show')->name('visual_novel_characters.show');
    });

    Route::prefix('stories')->group(function () {
        Route::get('/', 'StoryController@index')->name('stories.index');
    });

    Route::prefix('assets')->group(function () {
        Route::get('/characters', 'CharacterController@index')->name('characters.index');
        Route::get('/backgrounds', 'BackgroundController@index')->name('backgrounds.index');
        Route::get('/musics', 'MusicController@index')->name('musics.index');   
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
