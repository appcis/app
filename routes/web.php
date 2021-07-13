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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::any('sms', \App\Http\Controllers\SmsController::class)->name('sms');
    Route::resource('agent', \App\Http\Controllers\AgentController::class);
    Route::resource('groupe', \App\Http\Controllers\GroupeController::class);
    Route::resource('utilisateur', \App\Http\Controllers\UserController::class)
        ->parameters(['utilisateur' => 'user']);
});

Route::prefix('theme')->name('theme.')->middleware(['auth'])->group(function () {
    Route::view('dashboard', 'pages.theme.dashboard')->name('dashboard');
});
