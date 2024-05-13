<?php

use App\Http\Controllers\MovieController;

// Route::get('URL', [Controllerの名前::class, 'Controller内のfunction名']);

// 一覧表示
Route::get('/movies', [MovieController::class, 'index'])->name('index');
// 一覧表示（管理者）
Route::get('/admin/movies', [MovieController::class, 'adminindex'])->name('admin.index');
// 登録画面
Route::get('/admin/movies/create', [MovieController::class, 'createmovie'])->name('create');
// 登録処理
Route::post('/admin/movies/store', [MovieController::class, 'store'])->name('store');
// 編集画面
Route::get('/admin/movies/{id}/edit/', [MovieController::class, 'editmovie'])->name('edit');
// 更新処理
Route::patch('/admin/movies/{id}/update/', [MovieController::class, 'updatemovie'])->name('update');