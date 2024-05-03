<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\AdminController;

// Route::get('URL', [Controllerの名前::class, 'Controller内のfunction名']);
Route::get('/movies', [MovieController::class, 'index']);
Route::get('/admin/movies', [AdminController::class, 'index']);