<?php

use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\Service_typeController;
use App\Models\Assignment;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginController::class,'index'])->name('login'); //login.index -- convención middleware
Route::post('/',[LoginController::class,'store'])->name('login.store');

Route::get('/register',[RegisterController::class,'index'])->name('register.index');
Route::post('/register',[RegisterController::class,'store'])->name('register.store');

Route::post('/logout',[LogoutController::class,'store'])->name('logout');

Route::get('/profile',[ProfileController::class,'index'])->name('profile.index');

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

Route::get('/dashboard/users',[UserController::class,'index'])->name('user.index');
Route::get('/dashboard/users/create',[UserController::class,'create'])->name('user.create');
Route::post('/dashboard/users/create',[UserController::class,'store'])->name('user.store');
Route::delete('/dashboard/users/{user}',[UserController::class,'destroy'])->name('user.destroy');
Route::get('/dashboard/users/{user}/edit',[UserController::class,'edit'])->name('user.edit');
Route::patch('/dashboard/users/{user}',[UserController::class,'update'])->name('user.update');

Route::get('/dashboard/services',[ServiceController::class,'index'])->name('service.index');
Route::get('/dashboard/services/create',[ServiceController::class,'create'])->name('service.create');
Route::post('/dashboard/services/create',[ServiceController::class,'store'])->name('service.store');
Route::delete('/dashboard/services/{service}',[ServiceController::class,'destroy'])->name('service.destroy');
Route::get('/dashboard/services/{service}/edit',[ServiceController::class,'edit'])->name('service.edit');
Route::patch('/dashboard/services/{service}',[ServiceController::class,'update'])->name('service.update');

Route::get('/dashboard/service_types',[Service_typeController::class,'index'])->name('service_type.index');
Route::get('/dashboard/service_types/create',[Service_typeController::class,'create'])->name('service_type.create');
Route::post('/dashboard/service_types/create',[Service_typeController::class,'store'])->name('service_type.store');
Route::delete('/dashboard/service_types/{service_type}',[Service_typeController::class,'destroy'])->name('service_type.destroy');
Route::get('/dashboard/service_types/{service_type}/edit',[Service_typeController::class,'edit'])->name('service_type.edit');
Route::patch('/dashboard/service_types/{service_type}',[Service_typeController::class,'update'])->name('service_type.update');

Route::get('/dashboard/assignments',[AssignmentController::class,'index'])->name('assignment.index');
Route::get('/dashboard/assignments/create',[AssignmentController::class,'create'])->name('assignment.create');
Route::post('/dashboard/assignments/create',[AssignmentController::class,'store'])->name('assignment.store');
Route::delete('/dashboard/assignments/{assignment}',[AssignmentController::class,'destroy'])->name('assignment.destroy');
Route::get('/dashboard/assignments/{assignment}/edit',[AssignmentController::class,'edit'])->name('assignment.edit');
Route::patch('/dashboard/assignments/{assignment}',[AssignmentController::class,'update'])->name('assignment.update');
//Ruta especial
Route::get('/dashboard/assignments/{assignment}/end',[AssignmentController::class,'setEnd'])->name('assignment.setEnd');
