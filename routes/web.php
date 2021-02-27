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
Route::get('/', 'RegisterController@index')->name('register-page');
Route::post('/register', 'RegisterController@register')->name('register');
Route::get('/employees', 'EmployeeController@listEmployees')->name('list-employees');
Route::post('/vacation', 'EmployeeController@switchVacation')->name('list-employees');