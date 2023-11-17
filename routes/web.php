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
    return redirect('f1/create');
});


Route::group(['prefix'=>'f1', 'as'=>'f1.'],function(){
    Route::post('/', 'F1Controller@store')->name('store');
    Route::get('/create', 'F1Controller@create')->name('create');
    Route::get('/{id}', 'F1Controller@qr')->name('qr');
    Route::get('/edit/{slug}', 'F1Controller@edit')->name('edit');
    Route::post('/update/{id}', 'F1Controller@update')->name('update');
});
