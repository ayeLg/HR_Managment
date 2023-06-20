<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\EmployController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TeamController;
use App\Models\Attendance;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::controller(AuthController::class)->group(function () {
    Route::post('login','login');
    Route::post('register','register');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/admin', AdminController::class);
    Route::apiResource('/project', ProjectController::class);
    Route::apiResource('/team', TeamController::class);
    Route::apiResource('/attendance', AttendanceController::class);

    Route::apiResource('/employs', EmployController::class);
});


