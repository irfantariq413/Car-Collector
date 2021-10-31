<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\AuthController;

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

Route::get('/', [AuthController::class, 'index'])->name('home');
Route::get('home', [AuthController::class, 'index'])->name('home');
Route::get('user/login', [AuthController::class, 'login'])->name('user.login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('user/registration', [AuthController::class, 'registration'])->name('user.register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('logout', [AuthController::class, 'logout'])->name('user.logout');
 
Route::get('car/manage',[CarController::class,'manage'])->name('car.manage');
Route::get('car/add',[CarController::class,'create'])->name('car.add');
Route::post('car/store',[CarController::class,'store'])->name('car.store');
Route::get('car/edit/{id}',[CarController::class,'edit'])->name('car.edit');
Route::put('car/update/{id}',[CarController::class,'update'])->name('car.update');
Route::get('car/delete/{id}',[CarController::class,'delete'])->name('car.delete');