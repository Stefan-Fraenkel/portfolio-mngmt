<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;

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

Route::get('/', [PortfolioController::class, 'index'])->name('home');


Route::get('/generic', function () {
    return view('solid-state.generic');
})->name('generic');

Route::get('/elements', function () {
    return view('solid-state.elements');
})->name('elements');

Route::get('/portfolio', [PortfolioController::class, 'info'])->name('portfolio');
Route::get('/skills', [PortfolioController::class, 'skills'])->name('skills');
Route::get('/projects', [PortfolioController::class, 'projects'])->name('projects');
Route::get('/employments', [PortfolioController::class, 'employments'])->name('employments');
Route::get('/cv', [PortfolioController::class, 'cv'])->name('cv');


Route::post('/send_mail', [PortfolioController::class, 'sendMail'])->name('send_mail');

Route::get('/setup', [PortfolioController::class, 'initialSetup'])->name('update_portfolio');
