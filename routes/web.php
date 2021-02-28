<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Route::prefix('admin')->group(function () {

    Route::get('/', function () {
        return view('admin_template');
    })->name('admin');

    Route::resource('worker', 'App\Http\Controllers\WorkerController')->except(['update', 'edit']);
    Route::get('/worker/{id}/edit',[App\Http\Controllers\WorkerController::class, 'edit'])->name('worker.edit');
    Route::post('/worker/{id}', [App\Http\Controllers\WorkerController::class, 'update'])->name('worker.update');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
