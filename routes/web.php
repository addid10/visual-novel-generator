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

Route::view('/', 'index')->name('dashboard.index');

Route::view('/visual_novels', 'visual_novels.index')->name('visual_novels.index');

Route::view('/stories', 'stories.index')->name('stories.index');
Route::view('/lists', 'stories.list')->name('stories.list');

Route::prefix('assets')->group(function () {

    Route::view('/characters', 'characters.index')->name('characters.index');

    Route::view('/backgrounds', 'backgrounds.index')->name('backgrounds.index');

    Route::view('/musics', 'musics.index')->name('musics.index');   
});