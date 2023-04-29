<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

    Route::get('/', [\App\Http\Controllers\IssueController::class,'index'])->name('index');
    Route::get('issue/{issue}', [\App\Http\Controllers\IssueController::class,'show']);
    Route::get('/createIssue', [\App\Http\Controllers\IssueController::class,'create']);
    Route::post('/issue', [\App\Http\Controllers\IssueController::class,'store']);
    Route::get('issue/{issue}/edit', [\App\Http\Controllers\IssueController::class,'edit']);
    Route::put('/issue/{issue}', [\App\Http\Controllers\IssueController::class,'update']);
    Route::delete('/issue/{issue}', [\App\Http\Controllers\IssueController::class,'destroy']);
    Route::delete('/logout', [\App\Http\Controllers\AuthController::class,'destroy']);
    Route::delete('/del/{issue}', [\App\Http\Controllers\IssueController::class,'destroy_file']);

});

//no auth
Route::get('/login', [\App\Http\Controllers\AuthController::class,'create'])->name('login')->middleware('guest');
Route::post('/login', [\App\Http\Controllers\AuthController::class,'store'])->name('login.store');

//custom middleware
Route::get('/dev', [\App\Http\Controllers\IssueController::class,'dev_index'])->name('dev_index')->middleware('dev:dev');
Route::get('issue/{issue}/edit_dev', [\App\Http\Controllers\IssueController::class,'edit_dev'])->middleware('dev:dev');
Route::put('/issue_dev/{issue}', [\App\Http\Controllers\IssueController::class,'update_dev'])->middleware('dev:dev');
