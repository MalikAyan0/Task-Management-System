<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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

Route::get('login/view', [AuthController::class, 'showLoginForm'])->name('login.view');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register/view', [AuthController::class, 'showRegistrationForm'])->name('register.view');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::middleware('auth.middleware')->group(function () {

    Route::get('/', function () {
        return view('pages.dashboard');
    })->name('dashboard');
    Route::get('tasks', [TasksController::class, 'index'])->name('tasks.index');
    Route::get('tasks/create', [TasksController::class, 'create'])->name('tasks.create');
    Route::post('tasks', [TasksController::class, 'store'])->name('tasks.store');
    Route::get('tasks/{id}/edit', [TasksController::class, 'edit'])->name('tasks.edit');
    Route::put('tasks/{task}', [TasksController::class, 'update'])->name('tasks.update');
    Route::delete('tasks/{task}', [TasksController::class, 'destroy'])->name('tasks.destroy');

    Route::get('/change-password', [AuthController::class, 'showChangePasswordForm'])->name('password.change');
    Route::post('/change-password', [AuthController::class, 'updatePassword'])->name('password.update');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
