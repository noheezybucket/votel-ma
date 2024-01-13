<?php

use App\Http\Controllers\CandidatController;
use App\Http\Controllers\ElecteurController;
use App\Http\Controllers\ProgrammeController;
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

// auth
Route::prefix('auth')->name('auth.')->group(function () {
    Route::view('login', 'auth.login')->name('login');
    Route::view('register', 'auth.register')->name('register');
});

// admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    // dashboard
    Route::view('dashboard', 'admin.dashboard')->name('dashboard');

    // candidates views
    Route::view('list-candidates', 'candidate.list')->name('list-candidate');
    Route::view('create-candidate', 'candidate.create')->name('create-candidate');
    // programmes views
    Route::view('list-programs', 'program.list')->name('list-programs');
    Route::get('create-program', [ProgrammeController::class, 'programDropdowns'])->name('create-program');
    // secteurs views
    Route::view('list-secteurs', 'secteur.list')->name('list-secteurs');
    Route::view('create-secteur', 'secteur.create')->name('create-secteur');
});


Route::prefix('electeur')->name('electeur.')->group(function () {
    Route::get('candidates', [ElecteurController::class, 'candidates_list'])->name('candidates');
    Route::get('candidates/{id}', [ElecteurController::class, 'view_candidate'])->name('view-candidate');
    Route::get('programs', [ElecteurController::class, 'programs_list'])->name('programs');
    Route::get('programs/{id}', [ElecteurController::class, 'view_program'])->name('view-program');

    Route::view('statistics', 'electeur.stats')->name('stats');
});
