<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DiazController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('signin',[LoginController::class,'signin']);
Route::post('register',[LoginController::class,'register']);
Route::post('contactform',[LoginController::class,'contactform']);

Route::post('trial',[DiazController::class,'trial']);
Route::post('property',[DiazController::class,'property']);
Route::post('project',[DiazController::class,'project']);
Route::post('family',[DiazController::class,'family']);
Route::post('member',[DiazController::class,'member']);

Route::get('trials',[DiazController::class,'trials']);
Route::get('properties',[DiazController::class,'properties']);
Route::get('projects',[DiazController::class,'projects']);
Route::get('families',[DiazController::class,'families']);
Route::get('members',[DiazController::class,'members']);

Route::get('allstats',[DiazController::class,'allstats']);
Route::get('allyearsstats',[DiazController::class,'allyearsstats']);

Route::get('usertrials/{userid}',[DiazController::class,'usertrials']);
Route::get('userproperties/{userid}',[DiazController::class,'userproperties']);
Route::get('userprojects/{userid}',[DiazController::class,'userprojects']);
Route::get('usermembers/{userid}',[DiazController::class,'usermembers']);
Route::get('userallyearsstats/{userid}',[DiazController::class,'userallyearsstats']);
Route::get('userallstats/{userid}',[DiazController::class,'userallstats']);

Route::get('questions',[DiazController::class,'questions']);

