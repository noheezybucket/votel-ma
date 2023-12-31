<?php

use App\Http\Controllers\CandidatController;
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

// candidates routes

Route::prefix('admin')->name('admin.')->group(function () {
    Route::view('list-candidate', 'candidate.list')->name('list-candidate');
    Route::view('create-candidate', 'candidate.create')->name('create-candidate');
});

Route::prefix('auth')->name('auth.')->group(function () {
    Route::view('login', 'auth.login')->name('login');
});
