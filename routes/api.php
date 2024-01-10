<?php

use App\Http\Controllers\CandidatController;
use App\Http\Controllers\ProgrammeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('candidate')->name('candidate.')->group(function () {
    Route::get('list', [CandidatController::class, 'index'])->name('list');
    Route::post('create', [CandidatController::class, 'create'])->name('create');
    Route::put('update/{id}', [CandidatController::class, 'update'])->name('update');
    Route::delete('delete/{id}', [CandidatController::class, 'delete'])->name('delete');
});

Route::prefix('program')->name('program.')->group(function () {
    Route::get('list', [ProgrammeController::class, 'index'])->name('list');
    Route::post('create', [ProgrammeController::class, 'create'])->name('create');
    Route::put('update/{id}', [ProgrammeController::class, 'update'])->name('update');
    Route::delete('delete/{id}', [ProgrammeController::class, 'delete'])->name('delete');
});
