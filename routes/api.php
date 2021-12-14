<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AuthController;

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


// public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/users', [AuthController::class, 'getUsers']);

//protected routes
Route::group(['middleware' => ['auth:sanctum']], function(){
    //Route::get('/tickets',[TicketController::class,'index']);
    Route::post('tickets',[TicketController::class,'store']);
    //Route::post('/tickets/{ticket}',[TicketController::class,'show']);
    Route::post('/logout', [AuthController::class, 'logout']);

});