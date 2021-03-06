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

// get only active Austrians
Route::get('/austrians', 'UserController@austrians');

// edit details of a user only if details exist
Route::put('/users/{id}/details', 'UserController@editDetails');

// delete a user only if details not exist
Route::delete('/users/{id}', 'UserController@delete');
