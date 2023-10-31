<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::apiResource('students', StudentController::class);
Route::get('/student/search', 'StudentController@search');
Route::middleware(['auth:api'])->group(function () {
    
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
