<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScheduleController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/index', [ScheduleController::class, 'index']);
Route::post('/store', [ScheduleController::class, 'store']);
Route::get('/show/{id}', [ScheduleController::class, 'show']);
Route::put('/update/{id}', [ScheduleController::class, 'update']);
Route::delete('/destroy/{id}', [ScheduleController::class, 'destroy']);
//Route::get('/cep/{cep}', [ScheduleController::class, 'queryCep']);
