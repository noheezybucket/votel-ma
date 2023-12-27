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

Route::prefix('candidate')->name('candidate.')->group(function () {
    Route::view('listview', 'candidate.list')->name('list');
    Route::view('create', 'candidate.create')->name('create');
});

Route::post('/candidate/create/processing', [CandidatController::class, 'create_candidate'])->name('create_candidate_processing');

Route::get('/candidate/read/{id}', [CandidatController::class, 'read'])->name('view_candidate');

Route::get('/candidate/update/{id}', [CandidatController::class, 'update'])->name('update_candidate');
Route::post('/candidate/update/processing', [CandidatController::class, 'update_candidate'])->name('update_candidate_processing');

Route::get('/candidate/delete/{id}', [CandidatController::class, 'delete'])->name('delete_candidate');
Route::post('/candidate/delete/processing', [CandidatController::class, 'delete_candidate'])->name('delete_candidate_processing');
