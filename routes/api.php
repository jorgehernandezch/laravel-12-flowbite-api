<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;

Route::prefix('v1')->group(function () {
   Route::post('/login', [AuthController::class, 'login']);
   Route::prefix('/register')->group(function () {
      Route::post('/user', [AuthController::class, 'userRegister']);
   });
   Route::post('/forgot-password-token', [AuthController::class, 'generateResetToken']);
   Route::post('/reset-password', [AuthController::class, 'resetPassword']);
   Route::middleware('auth:sanctum')->group(function () {
      //Auth User Routes
      Route::prefix('/user')->group(function () {
         Route::get('/', [UserController::class, 'fetchAuthUser']);
         Route::put('/basic-info', [UserController::class, 'updateBasicInfo']);
         Route::put('/password', [UserController::class, 'updatePassword']);
         Route::put('/personal-data', [UserController::class, 'updatePersonalData']);
         Route::put('/social-profile', [UserController::class, 'updateSocialProfile']);
         Route::post('/deactivate', [UserController::class, 'deactivateAccount']);
         Route::delete('/delete', [UserController::class, 'deleteAccount']);
      });
      //Logout route
      Route::post('/logout', [AuthController::class, 'logout']);
   });
});
