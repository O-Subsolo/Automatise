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
    return view('welcome');
});

Route::get('/produtos', 'ProductController@index')->name('product.index');

Route::get('/criar_produto', 'ProductController@create')->name('product.create');

Route::get('/editar_produto/{id}', 'ProductController@edit')->name('product.edit');

Route::post('/product', 'ProductController@store')->name('product.store');

Route::put('/product/{id}', 'ProductController@update')->name('product.update');

Route::delete('/produtos/{id}', 'ProductController@delete');

//-------------------------------------- Category ----------------------------------------------------------------------

Route::get('/category_exists/{name}/{class}', 'CategoryController@category_exists');

Route::post('/new_category', 'CategoryController@store');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/domains/{length?}', 'TesteController@domains');
