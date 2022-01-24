<?php

use App\Http\Controllers\AjaxZipcodeController;
use App\Http\Controllers\EightyNineScorecardController;
use App\Http\Controllers\ZipcodeController;
use App\Services\CalculateDistance;
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
    return view('home.index');
})->name('home');

Route::get('89-score', [EightyNineScorecardController::class, 'index'])->name('89-score.index');
Route::post('89-score', [EightyNineScorecardController::class, 'show'])->name('89-score.show');

Route::get('zipcode-distance', [ZipcodeController::class, 'index'])->name('zipcode-distance');

Route::post('ajax/distance', [AjaxZipcodeController::class, 'show'])->name('ajax.distance');
