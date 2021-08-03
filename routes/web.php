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
Route::prefix('review')->group(function(){
    Route::get('select-school', [SchoolController::class, 'index']);
    Route::get('create', [ReviewController::class, 'index']);
});
