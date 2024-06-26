<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\VolunteerController;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function () {
    Route::resource('/category', CategoryController::class);
    Route::resource('/books', BookController::class);
    Route::resource('/members', MemberController::class);
    Route::resource('/borrowings', BorrowingController::class);
    Route::resource('/supervisor', SupervisorController::class);
    Route::resource('/volunteer', VolunteerController::class);
});
