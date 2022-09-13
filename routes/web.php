<?php

Route::get('/', function () {
    return redirect('admin');
});

Route::get('/admin/{demopage?}', 'DemoController@demo')->name('demo');

Route::resource('/categorias', 'Categorias\CategoriaController');
Route::resource('/clientes', 'Clientes\ClienteController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
