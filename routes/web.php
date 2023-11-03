<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\ExpenditureController;

Route::get('/expenditures/create', 'App\Http\Controllers\ExpenditureController@create')->name('expenditures.create');

Route::resource('/expenditures', ExpenditureController::class);
Route::get('/contacts', 'App\Http\Controllers\ContactController@index')->name('contacts.index');
Route::get('/contacts/create', 'App\Http\Controllers\ContactController@create')->name('contacts.create');
Route::post('/contacts', 'App\Http\Controllers\ContactController@store')->name('contacts.store');
Route::get('/contacts/{id}/edit', 'App\Http\Controllers\ContactController@edit')->name('contacts.edit');
Route::put('/contacts/{id}', 'App\Http\Controllers\ContactController@update')->name('contacts.update');
Route::delete('/contacts/{id}', 'App\Http\Controllers\ContactController@destroy')->name('contacts.destroy');
Auth::routes();
Route::get('/contacts/{id}', 'App\Http\Controllers\ContactController@show')->name('contacts.show');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
