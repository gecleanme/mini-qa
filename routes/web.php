<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\IssueController::class,'index'])->name('index')->middleware('auth');
Route::get('/dev', [\App\Http\Controllers\IssueController::class,'dev_index'])->name('dev_index')->middleware('dev:dev');
Route::get('issue/{issue}', [\App\Http\Controllers\IssueController::class,'show'])->middleware('auth');
Route::get('/createIssue', [\App\Http\Controllers\IssueController::class,'create'])->middleware('auth');
Route::post('/issue',[\App\Http\Controllers\IssueController::class,'store']);
Route::get('issue/{issue}/edit', [\App\Http\Controllers\IssueController::class,'edit']);
Route::get('issue/{issue}/edit_dev', [\App\Http\Controllers\IssueController::class,'edit_dev'])->middleware('dev:dev');
Route::put('/issue/{issue}',[\App\Http\Controllers\IssueController::class,'update']);
Route::put('/issue_dev/{issue}',[\App\Http\Controllers\IssueController::class,'update_dev'])->middleware('dev:dev');
Route::delete('/issue/{issue}',[\App\Http\Controllers\IssueController::class,'destroy']);
Route::get('/login', [\App\Http\Controllers\AuthController::class,'create'])->name('login')->middleware('guest');
Route::post('/login', [\App\Http\Controllers\AuthController::class,'store'])->name('login.store');
Route::delete('/logout',[\App\Http\Controllers\AuthController::class,'destroy']);
Route::delete('/del/{issue}',[\App\Http\Controllers\IssueController::class,'destroy_file']);
