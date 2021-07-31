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

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {

    Route::any('/sms', [\App\Http\Controllers\SmsController::class, 'send'])
        ->name('sms.send');
    Route::get('/sms/historique', [\App\Http\Controllers\SmsController::class, 'historique'])
        ->name('sms.historique');
    Route::get('/sms/{sms}', [\App\Http\Controllers\SmsController::class, 'show'])
        ->name('sms.show')
        ->middleware('can:show-sms,sms');

    Route::middleware('can:admin')->group(function () {
        Route::resource('agent', \App\Http\Controllers\AgentController::class);
        Route::resource('groupe', \App\Http\Controllers\GroupeController::class);
        Route::resource('utilisateur', \App\Http\Controllers\UserController::class)
            ->parameters(['utilisateur' => 'user']);

        Route::prefix('parametre')->name('parametre.')->group(function () {
            Route::resource('grade', \App\Http\Controllers\Parametre\GradeController::class);
        });
        Route::prefix('theme')->name('theme.')->middleware(['auth'])->group(function () {
            Route::view('dashboard', 'pages.theme.dashboard')->name('dashboard');
        });
    });
});

Route::fallback([\App\Http\Controllers\SmsController::class, 'send'])->middleware(['auth']);
