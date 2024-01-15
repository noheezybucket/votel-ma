<?php

use App\Http\Controllers\CandidatController;
use App\Http\Controllers\ElecteurController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\StatisticsController;
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
    return view('guest.welcome');
})->name('welcome-guest');

// auth
Route::prefix('auth')->name('auth.')->group(function () {
    Route::view('login', 'auth.login')->name('login-form');
    Route::view('register', 'auth.register')->name('register-form');
});

// admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    // dashboard
    Route::get('dashboard', [StatisticsController::class, 'index'])->name('dashboard');
    // candidates views
    Route::view('list-candidates', 'admin.candidate.list')->name('list-candidate');
    Route::view('create-candidate', 'admin.candidate.create')->name('create-candidate');
    // programmes views
    Route::view('list-programs', 'admin.program.list')->name('list-programs');
    Route::get('create-program', [ProgrammeController::class, 'programDropdowns'])->name('create-program');
    // secteurs views
    Route::view('list-secteurs', 'admin.secteur.list')->name('list-secteurs');
    Route::view('create-secteur', 'admin.secteur.create')->name('create-secteur');
});


Route::prefix('electeur')->name('electeur.')->group(function () {
    Route::get('candidates', [ElecteurController::class, 'candidates_list'])->name('candidates');
    Route::get('candidates/{id}', [ElecteurController::class, 'view_candidate'])->name('view-candidate');
    Route::get('programs', [ElecteurController::class, 'programs_list'])->name('programs');
    Route::get('programs/{id}', [ElecteurController::class, 'view_program'])->name('view-program');
    Route::get('statistics', [StatisticsController::class, 'index'])->name('stats');
});
