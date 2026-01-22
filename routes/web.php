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

Route::get('/', function () {
    return view('index');
});
Route::get('/sql', function(){
    return view('sql.sql-course');
});
Route::get('/laravel', function(){
return view('laravel.model');
});
Route::get('/php', function(){
return view('php.php-course');
});