<?php

use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\ValidUser;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::view('/register', 'auth.register')->name('register');
Route::post('userSave', [UserController::class, 'register'])->name('userSave');



Route::middleware(ValidUser::class)->group(function () {
    // Route::view('/expenses', 'expenses.index')->name('expenses.index');
    Route::get('/expenses', [ExpensesController::class, 'index'])->name('expenses.index');
    Route::post('addExpenses', [ExpensesController::class, 'addExpenses'])->name('addExpenses');
    Route::delete('/expenses/{id}', [ExpensesController::class, 'destroy'])->name('expenses.destroy');
});



Route::view('/login', 'auth.login')->name('login');
Route::post('loginMatch', [UserController::class, 'login'])->name(('loginMatch'));


Route::get('logout', [UserController::class, 'logout'])->name('logout');
