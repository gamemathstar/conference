<?php

use App\Http\Controllers\HomeController;
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




Route::prefix("/")->group(function () {
    Route::get('/',[HomeController::class,'index']);
});
Route::prefix("/admin")->group(function () {
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login.form');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login');
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::resource('conferences', AdminConferenceController::class);
});


Route::group(['prefix' => 'participant'], function () {
    Route::get('/login', [ParticipantLoginController::class, 'showLoginForm'])->name('participant.login.form');
    Route::post('/login', [ParticipantLoginController::class, 'login'])->name('participant.login');
    Route::post('/logout', [ParticipantLoginController::class, 'logout'])->name('participant.logout');
});
