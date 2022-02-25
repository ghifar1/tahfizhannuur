<?php

use Illuminate\Support\Facades\Route;

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

Route::prefix('/dashboard')->middleware(['auth'])->group(function (){
    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::post('/', [\App\Http\Controllers\HafalanController::class, 'simpanHafalan']);
    Route::get('/ujian', [\App\Http\Controllers\DashboardController::class, 'ujian']);
    Route::post('/ujian', [\App\Http\Controllers\UjianController::class, 'save']);
});

//Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
//Route::post('/dashboard', [\App\Http\Controllers\HafalanController::class, 'simpanHafalan'])->middleware(['auth']);
Route::get('/hafalan', [\App\Http\Controllers\HafalanController::class, 'showAllData'])->middleware(['auth']);
Route::get('/datasiswa', [\App\Http\Controllers\DataSiswaController::class, 'index'])->middleware(['auth']);;
Route::post('/datasiswa', [\App\Http\Controllers\DataSiswaController::class, 'upload'])->middleware(['auth']);;
Route::get('/rahasia/{password}', [\App\Http\Controllers\RahasiaController::class, 'index']);
Route::post('/rahasia/{password}', [\App\Http\Controllers\RahasiaController::class, 'save']);

require __DIR__.'/auth.php';
