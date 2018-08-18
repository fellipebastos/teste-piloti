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

Auth::routes();

// Visualiza página principal
Route::get('/', 'HomeController@index')->name('index');

Route::middleware('auth')->group(function () {
    
    ## Profile ##
    // Visualiza profile
    Route::get('/profile/{id?}', 'ProfileController@edit')->name('profile');
    // Atualiza profile
    Route::post('/profile/update/{id}', 'ProfileController@update')->name('profile.update');
    // Remove profile
    Route::delete('/profile/delete', 'ProfileController@delete')->middleware('admin')->name('profile.delete');
    // Reativa profile
    Route::get('/profile/activate/{id}', 'ProfileController@activate')->middleware('admin')->name('profile.activate');
    
    ## Painel Admin ##
    // Visualiza Painel com lista de Usuários
    Route::get('/panel', 'PanelController@index')->middleware('admin')->name('panel');
});
