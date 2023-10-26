<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\ParticipantLoginController;
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
    Route::get('/',[HomeController::class,'index'])->name('login');

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
    Route::get('/logout', [ParticipantLoginController::class, 'logout'])->name('participant.logout');

    Route::get('/signup',[HomeController::class,'signup'])->name('participant.signup');
    Route::post('/signup',[HomeController::class,'signupPost'])->name('participant.signup');


    Route::get('/dashboard',[ParticipantController::class,'dashboard'])->name('participant.dashboard');
    Route::get('/conference/join/{id}',[ParticipantController::class,'joinConference'])->name('participant.conference.join');
    Route::get('/conference/download/{id}',[ParticipantController::class,'download'])->name('participant.conference.download');
    Route::post('/conference/upload',[ParticipantController::class,'upload'])->name('participant.conference.upload');


});
