<?php

use App\Http\Controllers\Reviews\ReviewController;
use App\Http\Controllers\Schools\SchoolController;
use App\Http\Controllers\Static\HomeController;
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
Route::get('/', [HomeController::class, 'index']);
Route::prefix('school')->group(function(){
    Route::get('/', [SchoolController::class, 'index'])->name('review.school');
    Route::post('/', [SchoolController::class, 'create']); 
});

Route::prefix('review')->group(function(){
    Route::get('create', [ReviewController::class, 'create'])->middleware('school.exist');
    Route::post('create', [ReviewController::class, 'store']);
    Route::get('{id}', [ReviewController::class, 'show']);
});
