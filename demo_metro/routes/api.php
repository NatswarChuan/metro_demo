<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\TicketController;

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

Route::get('/routes',[RouteController::class,'getAllAPI']);
Route::get('/route/{id}',[RouteController::class,'getByIdAPI']);
Route::get('/ticket',[TicketController::class,'findByPhoneAPI']);