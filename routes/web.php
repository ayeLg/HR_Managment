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
    return view('welcome');
});


// Route::get('/apple', function () {
//     return "apple";
// });


// Route::get('/orange', function () {
//     return "orange";
// });


// Route::get('/apple2', function () {
//     return "apple2";
// });

Route::get('/lhk', function () {
    return "lhk";
});
