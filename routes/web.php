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

//candidats
Route::get('/candidats/list', [CandidatController::class, 'index'])->name('list_candidate');

Route::get('/candidats/create', [CandidatController::class, 'create'])->name('create_candidate');
Route::post('/candidats/create/processing', [CandidatController::class, 'create_candidate'])->name('create_candidate_processing');

Route::get('/candidats/read/{id}', [CandidatController::class, 'read'])->name('view_candidate');

Route::get('/candidats/update/{id}', [CandidatController::class, 'update'])->name('update_candidate');
Route::post('/candidats/update/processing', [CandidatController::class, 'update_candidate'])->name('update_candidate_processing');

Route::get('/candidats/delete/{id}', [CandidatController::class, 'delete'])->name('delete_candidate');
Route::post('/candidats/delete/processing', [CandidatController::class, 'delete_candidate'])->name('delete_candidate_processing');
