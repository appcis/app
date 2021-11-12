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

    Route::get('/repertoire', \App\Http\Controllers\RepertoireController::class)->name('repertoire');

    Route::get('/sondage', [\App\Http\Controllers\SondageController::class, 'index'])->name('sondage.index');

    Route::middleware('can:admin')->group(function () {
        Route::prefix('parametre')->name('parametre.')->group(function () {
            Route::resource('grade', \App\Http\Controllers\Parametre\GradeController::class);
        });
    });

    Route::middleware('can:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::resource('agent', \App\Http\Controllers\Admin\AgentController::class);
        Route::resource('groupe', \App\Http\Controllers\Admin\GroupeController::class);
        Route::resource('utilisateur', \App\Http\Controllers\Admin\UserController::class)
            ->parameters(['utilisateur' => 'user']);
        Route::resource('sondage', \App\Http\Controllers\Admin\SondageController::class);
    });
});

Route::fallback([\App\Http\Controllers\SmsController::class, 'send'])->middleware(['auth']);
