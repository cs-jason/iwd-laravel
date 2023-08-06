<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\QuizController;
use App\Mail\Invitation;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('dashboard');
});

// Account Routes
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/', [UserController::class, 'showDashboard'])->name('dashboard');

// Lesson Routes
Route::post('/lesson/{lessonId}/mark-complete', [LessonController::class, 'markLessonAsComplete'])->name('lesson.markComplete');
Route::get('/lesson/1', [LessonController::class, 'showLesson1'])->middleware('auth');
Route::get('/lesson/2', [LessonController::class, 'showLesson2'])->middleware('auth');
Route::get('/lesson/3', [LessonController::class, 'showLesson3'])->middleware('auth');
Route::get('/lesson/4', [LessonController::class, 'showLesson4'])->middleware('auth');
Route::get('/lesson/5', [LessonController::class, 'showLesson5'])->middleware('auth');
Route::get('/lesson/6', [LessonController::class, 'showLesson6'])->middleware('auth');

// Quiz Routes
Route::post('/quiz/{lessonId}/quiz-submit', [QuizController::class, 'submitQuiz'])->name('quiz.submit');
Route::get('/quiz/1', [QuizController::class, 'showQuiz1'])->middleware('auth');
Route::get('/quiz/2', [QuizController::class, 'showQuiz2'])->middleware('auth');
Route::get('/quiz/3', [QuizController::class, 'showQuiz3'])->middleware('auth');
Route::get('/quiz/4', [QuizController::class, 'showQuiz4'])->middleware('auth');
Route::get('/quiz/5', [QuizController::class, 'showQuiz5'])->middleware('auth');
Route::get('/quiz/6', [QuizController::class, 'showQuiz6'])->middleware('auth');

// Solution Routes
Route::get('/quiz/1/solution', [QuizController::class, 'showSolution1'])->middleware('auth');
Route::get('/quiz/2/solution', [QuizController::class, 'showSolution2'])->middleware('auth');
Route::get('/quiz/3/solution', [QuizController::class, 'showSolution3'])->middleware('auth');
Route::get('/quiz/4/solution', [QuizController::class, 'showSolution4'])->middleware('auth');
Route::get('/quiz/5/solution', [QuizController::class, 'showSolution5'])->middleware('auth');
Route::get('/quiz/6/solution', [QuizController::class, 'showSolution6'])->middleware('auth');

// Certificate Routes
Route::get('/certificate', [UserController::class, 'showCertificate'])->name('certificate');
Route::get('/print-certificate', [UserController::class, 'printCertificate'])->name('certificate.print');

// Notifications Route
Route::post('/', [UserController::class, 'updateNotificationStatus'])->name('notification.update');

// Settings Routes
Route::get('/settings', [UserController::class, 'showSettingsForm'])->name('settings.show');
Route::post('/settings/update', [UserController::class, 'updateSettings'])->name('settings.update');
Route::post('/settings/reset-progress', [UserController::class, 'resetProgress'])->name('settings.reset-progress');
Route::delete('/settings/delete', [UserController::class, 'deleteAccount'])->name('settings.delete');

// Admin Route
Route::get('/admin-complete', [UserController::class, 'adminCompleteAll'])->name('admin.complete');


