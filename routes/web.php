<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SheetController;
use App\Http\Controllers\ScheduleController;

// Route::get('URL', [Controllerの名前::class, 'Controller内のfunction名']);

// 一覧表示
Route::get('/movies', [MovieController::class, 'index'])->name('index');
// 詳細
Route::get('/movies/{id}', [MovieController::class, 'detail'])->name('movie.detail');
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
// 更新処理
Route::delete('/admin/movies/{id}/destroy/', [MovieController::class, 'destroymovie'])->name('destroy');
// 詳細ページ（管理者）
Route::get('/admin/movies/{id}', [MovieController::class, 'adminDetail']);

// Sheet
// 一覧ページ
Route::get('/sheets', [SheetController::class, 'show']);

// Schedule
// 一覧ページ（管理者）
Route::get('/admin/schedules', [ScheduleController::class, 'show']);
// 詳細ページ（管理者）
Route::get('/admin/schedules/{id}', [ScheduleController::class, 'detail']);
// 作成ページ（管理者）
Route::get('/admin/movies/{id}/schedules/create', [ScheduleController::class, 'create'])->name('schedule.create');
// 作成（管理者）
Route::post('/admin/movies/{id}/schedules/store', [ScheduleController::class, 'store']);
// 編集ページ（管理者）
Route::get('/admin/schedules/{scheduleId}/edit', [ScheduleController::class, 'edit']);
// 更新（管理者）
Route::patch('/admin/schedules/{id}/update', [ScheduleController::class, 'update']);
// 削除（管理者）
Route::delete('/admin/schedules/{id}/destroy', [ScheduleController::class, 'destroy']);