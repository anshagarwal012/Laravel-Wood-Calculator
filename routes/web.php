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

Route::get('/add', function () {
    return view('main_dashboard');
});
Route::get('/get', function () {
    return view('main_list');
});
// Route::get('/get/{id}', function () {
//     return view('main_list');
// });

Route::get('/', function () {
    return redirect('/add');
});

// Route::get('/Wood_List', function () {
//     return view('lists');
// });

// Route::get('/Circle_Wood_List', function () {
//     return view('circlelists');
// });

// Route::get('/m', function () {
//     Artisan::call('migrate:refresh');
// });
