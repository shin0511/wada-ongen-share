<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShareController;


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

Route::get('/', [ShareController::class, 'index'])->middleware('auth');

Auth::routes();



Route::resource('shares', ShareController::class)->only(['index', 'store', 'update', 'destroy'])->middleware('auth');
