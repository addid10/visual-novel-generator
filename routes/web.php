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
    
    Route::prefix('visual-novels')->group(function () {
        Route::get('/', 'VisualNovelController@index')->name('visual-novels.index');
        Route::post('/', 'VisualNovelController@store')->name('visual-novels.store');
        Route::put('/{visualNovel}', 'VisualNovelController@update')->name('visual-novels.update');
        Route::delete('/{visualNovel}', 'VisualNovelController@destroy')->name('visual-novels.destroy');
        Route::get('/{visualNovel}/edit', 'VisualNovelController@edit')->name('visual-novels.edit');

        Route::get('/iseng', 'VisualNovelCharacterController@iseng')->name('visual-novel-characters.iseng');
        Route::post('/characters', 'VisualNovelCharacterController@store')->name('visual-novel-characters.store');
        Route::delete('/characters/{character}', 'VisualNovelCharacterController@destroy')->name('visual-novel-characters.destroy');
        Route::get('/{visualNovel}/characters', 'VisualNovelCharacterController@show')->name('visual-novel-characters.show');
    });

    Route::prefix('stories')->group(function () {
        Route::get('/', 'StoryController@index')->name('stories.index');
        Route::post('/', 'StoryController@store')->name('stories.store');
        Route::get('/{visualNovel}', 'StoryController@show')->name('stories.show');
        Route::get('/{stories}/edit', 'StoryController@edit')->name('stories.edit');
    });

    Route::prefix('assets')->group(function () {
        Route::get('/characters', 'CharacterController@index')->name('characters.index');
        Route::get('/characters-images', 'CharacterImageController@index')->name('characters-images.index');   


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
