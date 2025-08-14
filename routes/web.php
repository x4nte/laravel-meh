<?php

use App\Http\Controllers\{AccountController, LoginController, QuestionController, RegisterController, TestController};
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::middleware('auth')->group(function () {
    Route::get('/', fn () => view('home'));

    Route::prefix('tests')->group(function () {
        Route::get('/', [TestController::class, 'index'])->name('tests.index');
        Route::get('/{topic}', [TestController::class, 'show'])->name('tests.show');
        Route::post('/{topic}/submit', [TestController::class, 'submit'])->name('tests.submit');
    });

    Route::prefix('questions')->group(function () {
        Route::get('/', [QuestionController::class, 'index'])->name('questions.index');
        Route::get('/{id}', [QuestionController::class, 'show'])->name('questions.show');
    });

    Route::prefix('account')->group(function () {
        Route::get('/', [AccountController::class, 'index'])->name('account.index');
        Route::put('/password', [AccountController::class, 'updatePassword'])->name('account.updatePassword');
        Route::put('/email', [AccountController::class, 'updateEmail'])->name('account.updateEmail');
    });

    Route::prefix('admin/questions')->middleware(AdminMiddleware::class)->group(function () {
        Route::get('/create', [QuestionController::class, 'create'])->name('admin.questions.create');
        Route::get('/{id}/edit', [QuestionController::class, 'edit'])->name('admin.questions.edit');
        Route::put('/{id}', [QuestionController::class, 'update'])->name('admin.questions.update');
        Route::post('/', [QuestionController::class, 'store'])->name('admin.questions.store');
        Route::delete('/{id}', [QuestionController::class, 'destroy'])->name('admin.questions.destroy');
    });
});
