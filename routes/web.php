<?php

use Illuminate\Support\Facades\Route;

// COMMON ROUTES
Route::get('/', [App\Http\Controllers\Site\PostsController::class, 'index'])
    ->name('site.index');

// DASHBOARD ROUTES
// USER
Route::get('/dashboard', [App\Http\Controllers\Dashboard\User\DashboardController::class, 'dashboard'])
    ->middleware(['auth', 'role:user'])
    ->name('user.index');

// ADMIN
Route::middleware(['auth', 'role:admin'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function() {

    Route::get('/', [App\Http\Controllers\Dashboard\Admin\DashboardController::class, 'dashboard'])
        ->name('index');
    Route::get('/roles-list', [App\Http\Controllers\Dashboard\Admin\Api\RoleController::class, 'roles'])
        ->name('roles-list');
    Route::apiResource('/roles', App\Http\Controllers\Dashboard\Admin\Api\RoleController::class);
    Route::resource('/permissions', App\Http\Controllers\Dashboard\Admin\PermissionController::class)
        ->names('permissions');
});

require __DIR__.'/auth.php';
