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

Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('users', 'UsersController', [
	'names' => [
		'index' => 'users', 'create' => 'users.add', 'store' => 'users.store',
		'edit' => 'users.edit', 'update' => 'users.update',
		'dastroy' => 'users.destroy',
	]
]);

Route::get('crypto/{int}', 'CryptoController@crypto')->name('crypto');
Route::post('crypto', 'CryptoController@cryptopost')->name('cryptopost');
Route::get('crypto/{int}/{id}', 'CryptoController@getcrypto')->name('getcrypto');
Route::post('crypto/{int}/{id}', 'CryptoController@postcrypto')->name('postcrypto');
Route::get('files', 'CryptoController@files')->name('files');
Route::delete('files/{id}', 'CryptoController@del_files');
Route::get('about', 'CryptoController@about')->name('about');
