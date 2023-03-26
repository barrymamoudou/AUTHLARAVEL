<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\Api\Auth\AuthentificationController;

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

Route::get('allDoctor',[DoctorController::class,'AllDoctor']);
Route::POST('doctor',[DoctorController::class,'insertDoctor']);
Route::put('updateDoctor/{id}',[DoctorController::class,'updateDoctor']);
Route::delete('deleteDoctor/{id}',[DoctorController::class,'deleteDoctor']);

Route::get('users', function(){
    return User::all();
});
Route::group(['namespace'=>'Api\Auth'],function(){
    Route::post('login',[AuthentificationController::class, 'login']);
});
