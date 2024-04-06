<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;

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

/* Mostrar todas las ideas / Search Bar */

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['prefix' => 'ideas/', 'as' => 'ideas.'], function () {
    /* Mostar una sola Idea */
    Route::get('/{idea}', [IdeaController::class, 'show'])->name('show');

    /* Editear Idea */
    Route::get('/{idea}/edit', [IdeaController::class, 'edit'])->name('edit')->middleware('auth');
    Route::put('/{idea}', [IdeaController::class, 'update'])->name('update')->middleware('auth');

    /* Eliminar Idea */
    Route::delete('/{idea}', [IdeaController::class, 'destroy'])->name('destroy')->middleware('auth');

    /* Cargar Ideas a la DB */
    Route::post('', [IdeaController::class, 'store'])->name('store');

    /* Comentarios */
    Route::post(
        '/{idea}/comments',
        [CommentController::class, 'store']
    )->name('comments.store')->middleware('auth');
});

/* Register page */
Route::get('/register', [AuthController::class, 'register'])->name('register');

/* Register subir datos user */
Route::post('/register', [AuthController::class, 'store']);

/* Login page */
Route::get('/login', [AuthController::class, 'login'])->name('login');

/* Login ingresar datos user */
Route::post('/login', [AuthController::class, 'authenticate']);

/* Logout */
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
