<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AcertijoController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\SupAcertijoController;
use App\Http\Controllers\ClientController;
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

Route::get('/', function () {
   return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// client

// Route::middleware(['auth', 'admin'])->group(function () {
   // Route::get('/race',[CarreraController::class,'index']);
   // Route::get('race/create',[CarreraController::class, 'create']);
   // Route::post('client',[AdminController::class, 'store']);
   // Route::get('client/{id}/edit',[AdminController::class, 'edit']);
   // Route::put('client/{id}',[AdminController::class, 'update']);
   // Route::delete('client/{id}/edit',[AdminController::class, 'destroy']);
   Route::resource('client', AdminController::class)->middleware(['admin']);
   Route::resource('race',CarreraController::class)->middleware('admin');
   Route::resource('acertijo', AcertijoController::class);

   // Route::resource('acertijo', AcertijoController::class)->middleware(['acertijero']);
   
  
   Route::resource('users', ClientController::class);
   Route::get('changeUse',[AcertijoController::class,'changeUse'])->name('changeUse');

   //  Route::get('/prueba',[ClientController::class,'index']);
   // Route::resource('user', [UserController::class]);
//  });
//Route::post('/dashboard',[AdminController::class, 'store']);
//Route::put('/dashboard/edit',[AdminController::class,'edit']);
//Route::put('/dashboard/destroy',[AdminController::class,'destroy']);
//Route::resource('/acertijo', [AcertijoController::class]);

// acertijos vistas
// Route::middleware(['auth', 'acertijero'])->group(function () {
//    Route::resource('acertijo', AcertijoController::class);
//    // Route::get('/acertijo',[AcertijoController::class, 'index']);
//    // Route::post('/acertijo',[AcertijoController::class,'store']);
//    // Route::get('acertijo/create',[AcertijoController::class, 'create']);
// });

// funcion acertijos
// Route::middleware(['auth', 'admin'])->group(function () {
//    Route::resource('acertijo', AcertijoController::class);
// });