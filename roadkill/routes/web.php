<?php

use Illuminate\Support\Facades\App;
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
    return view('index');
});

Route::post('/search', [App\Http\Controllers\SearchController::class, 'search'])->name('search');
Route::get('/search', [App\Http\Controllers\SearchController::class, 'show']);

Route::get('/test', function() {
    return view('test');
});
