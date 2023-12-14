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
Route::get('/candidats/list', [CandidatController::class, 'index']);

Route::get('/candidats/create', [CandidatController::class, 'create']);
Route::post('/candidats/create/processing', [CandidatController::class, 'create_candidate']);

Route::get('/candidats/read/{id}', [CandidatController::class, 'read']);

Route::get('/candidats/update/{id}', [CandidatController::class, 'update']);
Route::post('/candidats/update/processing', [CandidatController::class, 'update_candidate']);
