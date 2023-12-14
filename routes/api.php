<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('permissions', Api\Admin\PermissionsController::class)->only([
    'index', 'show', 'store', 'update', 'destroy'
]);
Route::apiResource('roles', Api\Admin\RolesController::class)->only([
    'index', 'show', 'store', 'update', 'destroy'
]);
Route::apiResource('projects', Api\Admin\ProjectController::class)->only([
    'index', 'store'
]);
Route::post('/login', [Api\AuthController::class, 'login'])->name('login');

Route::post('/logout', [Api\AuthController::class, 'logout'])->name('logout');