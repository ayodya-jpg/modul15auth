<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\auth\LoginController;
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

Route::get('/', function () {
    return redirect('login');
});

Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
//Route 
Route::resource('employees', EmployeeController::class)->middleware('auth');
Route::get('profile', ProfileController::class)->name('profile')->middleware('auth');

Auth::routes();

Route::post('/login', [LoginController::class, 'authenticate']);
