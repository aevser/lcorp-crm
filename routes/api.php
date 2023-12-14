<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;



Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource('projects', Api\Admin\ProjectController::class)->only([
        'index', 'store', 'update', 'destroy'
    ]);
});
Route::apiResource('permissions', Api\Admin\PermissionsController::class)->only([
    'index', 'show', 'store', 'update', 'destroy'
]);
Route::apiResource('roles', Api\Admin\RolesController::class)->only([
    'index', 'show', 'store', 'update', 'destroy'
]);

Route::post('/login', [Api\AuthController::class, 'login'])->name('login');

Route::post('/logout', [Api\AuthController::class, 'logout'])->name('logout');