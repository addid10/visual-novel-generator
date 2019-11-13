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
        Route::get('/{visualNovel}/backgrounds', 'VisualNovelController@backgrounds')->name('backgrounds');
        Route::get('/{visualNovel}/musics', 'VisualNovelController@musics')->name('musics');

        Route::get('/iseng', 'VisualNovelCharacterController@iseng')->name('visual-novel-characters.iseng');
        Route::post('/characters', 'VisualNovelCharacterController@store')->name('visual-novel-characters.store');
        Route::delete('/characters/{character}', 'VisualNovelCharacterController@destroy')->name('visual-novel-characters.destroy');
        Route::get('/{visualNovel}/characters', 'VisualNovelCharacterController@show')->name('visual-novel-characters.show');
    });

    Route::prefix('stories')->group(function () {
        Route::get('/', 'StoryController@index')->name('stories.index');
        Route::post('/', 'StoryController@store')->name('stories.store');
        Route::get('/{visualNovel}', 'StoryController@show')->name('stories.show');
        Route::put('/{stories}', 'StoryController@update')->name('stories.update');
        Route::delete('/{stories}', 'StoryController@destroy')->name('stories.destroy');
        Route::get('/{stories}/edit', 'StoryController@edit')->name('stories.edit');
    });

    Route::prefix('assets')->group(function () {
        Route::get('/characters', 'CharacterController@index')->name('characters.index');
        Route::post('/characters', 'CharacterController@store')->name('characters.store');
        Route::put('/characters/{character}', 'CharacterController@update')->name('characters.update');
        Route::delete('/characters/{character}', 'CharacterController@destroy')->name('characters.destroy');
        Route::get('/characters/{character}/edit', 'CharacterController@edit')->name('characters.edit');


        Route::get('/characters-images', 'CharacterImageController@index')->name('characters-images.index');   
        Route::get('/characters-images/{characterImages}', 'CharacterImageController@show')->name('characters-images.show');   
        Route::delete('/characters-images/{characterImages}', 'CharacterImageController@destroy')->name('characters-images.destroy');   


        Route::get('/backgrounds', 'BackgroundController@index')->name('backgrounds.index');
        Route::post('/backgrounds', 'BackgroundController@store')->name('backgrounds.store');
        Route::put('/backgrounds/{background}', 'BackgroundController@update')->name('backgrounds.update');
        Route::delete('/backgrounds/{background}', 'BackgroundController@destroy')->name('backgrounds.destroy');
        Route::get('/backgrounds/{background}/edit', 'BackgroundController@edit')->name('backgrounds.edit');

        Route::get('/backgrounds/specific', 'BackgroundController@specific')->name('backgrounds.specific');
        Route::get('/musics/specific', 'MusicController@specific')->name('musics.specific');   

        Route::get('/musics', 'MusicController@index')->name('musics.index');   
        Route::post('/musics', 'MusicController@store')->name('musics.store');
        Route::put('/musics/{music}', 'MusicController@update')->name('musics.update');
        Route::delete('/musics/{music}', 'MusicController@destroy')->name('musics.destroy');
        Route::get('/musics/{music}/edit', 'MusicController@edit')->name('musics.edit');
    });
});

Route::group([ 'middleware' => ['auth','role:creator&guest star']], function () {

    Route::view('/', 'index')->name('dashboard.index');

    Route::prefix('game')->group(function () {
        Route::get('/', 'GameController@index')->name('game.index');
        Route::get('{game}/menu', 'GameController@menu')->name('game.menu');
        Route::get('{game}/play', 'GameController@play')->name('game.play');
        Route::post('{game}/save', 'GameController@save')->name('game.save');
        Route::get('{game}/next', 'GameController@showNextDialogue')->name('game.next');
        
    });

});

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login.index');
Route::post('/login', 'Auth\LoginController@login')->name('login.store');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
