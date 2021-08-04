<?php

use App\Http\Controllers\Reviews\ReviewController;
use App\Http\Controllers\Reviews\SchoolController;
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
    return view('static.home');
});
Route::prefix('review/school')->group(function(){
    Route::get('/', [SchoolController::class, 'index'])->name('review.school');
    Route::post('/', [SchoolController::class, 'create'])->middleware('auth.school');
    Route::get('{id}/create', [ReviewController::class, 'index'])->where('id', '[0-9]+');
});
