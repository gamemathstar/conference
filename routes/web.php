<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLoginController;
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
    Route::get('/journal/about',[HomeController::class,'about'])->name('about');
    Route::get('/journal/author-guide',[HomeController::class,'author'])->name('author');

});
Route::prefix("/admin")->group(function () {
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login.form');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login');
    Route::get('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

    Route::get('/dashboard', [AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::get('/download/{submission}/{type?}', [AdminController::class,'download'])->name('admin.download');
    Route::post('/admin/review/{submission}', [AdminController::class,'submitReview'])->name('admin.review');
    Route::post('/admin/review/journal/{submission}', [AdminController::class,'submitReview'])->name('admin.review.journal');

});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::resource('conferences', AdminConferenceController::class);
    // User Management Routes
    Route::get('/users', [AdminController::class, 'index'])->name('users.index');
    Route::get('/users/{id}/edit', [AdminController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}/edit', [AdminController::class, 'update'])->name('users.update');

// Reset Password Routes
    Route::get('/users/{id}/reset-password', [AdminController::class, 'showResetPasswordForm'])->name('users.showResetPasswordForm');
    Route::post('/users/{id}/reset-password', [AdminController::class, 'resetPassword'])->name('users.resetPassword');

// Make Journal Admin Routes
    Route::get('/users/{id}/make-journal-admin', [AdminController::class, 'showMakeJournalAdminForm'])->name('users.showMakeJournalAdminForm');
    Route::post('/users/{id}/make-journal-admin', [AdminController::class, 'makeJournalAdmin'])->name('users.makeJournalAdmin');

    Route::get('/submissions/without-reviewer', [AdminController::class, 'submissionsWithoutReviewer'])->name('submissions.without.review');
    Route::post('/submissions/add-reviewer', [AdminController::class,'addReviewer'])->name('submissions.addReviewer');
    Route::get('/submissions/my-reviews', [AdminController::class,'myReviewSubmissions'])->name('submissions.myReviews');

    Route::get('/submissions/without-reviewer/journal', [AdminController::class, 'submissionsWithoutReviewerJournal'])->name('submissions.without.review.journal');
    Route::post('/submissions/add-reviewer/journal', [AdminController::class,'addReviewerJournal'])->name('submissions.addReviewer.journal');
    Route::get('/submissions/my-reviews/journal', [AdminController::class,'myReviewSubmissionsJournal'])->name('submissions.myReviews.journal');

});


Route::group(['prefix' => 'participant'], function () {
    Route::get('/login', [ParticipantLoginController::class, 'showLoginForm'])->name('participant.login.form');
    Route::post('/login', [ParticipantLoginController::class, 'login'])->name('participant.login');
    Route::get('/logout', [ParticipantLoginController::class, 'logout'])->name('participant.logout');

    Route::get('/signup',[HomeController::class,'signup'])->name('participant.signup');
    Route::post('/signup',[HomeController::class,'signupPost'])->name('participant.signup');


    Route::get('/dashboard',[ParticipantController::class,'dashboard'])->name('participant.dashboard');
    Route::get('/journal',[ParticipantController::class,'journal'])->name('participant.journal');
    Route::get('/conference/join/{id}',[ParticipantController::class,'joinConference'])->name('participant.conference.join');
    Route::get('/conference/download/{id}',[ParticipantController::class,'download'])->name('participant.conference.download');
    Route::post('/conference/upload',[ParticipantController::class,'upload'])->name('participant.conference.upload');
    Route::post('/journal/upload',[ParticipantController::class,'uploadJournal'])->name('participant.journal.upload');


});
