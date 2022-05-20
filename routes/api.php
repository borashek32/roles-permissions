<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::middleware(['auth', 'role:admin'])
//     ->name('admin.')
//     ->prefix('admin')
//     ->group(function() {

//     Route::apiResource('/roles', App\Http\Controllers\Dashboard\Admin\Api\RoleController::class);
// });
