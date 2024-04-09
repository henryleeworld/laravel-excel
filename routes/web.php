<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('users/import/', [UsersController::class, 'import']);
Route::get('users/export/', [UsersController::class, 'export']);
