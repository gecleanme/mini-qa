<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [\App\Http\Controllers\IssueController::class,'index'])->name('index')->middleware('auth');
Route::get('/dummy', function (){
    if(Gate::allows('dummy'))
    return 'it works!';
});
Route::get('/dev', [\App\Http\Controllers\IssueController::class,'dev_index'])->name('dev_index')->middleware('dev:dev');
Route::get('issue/{issue}', [\App\Http\Controllers\IssueController::class,'show']);
Route::get('/createIssue', [\App\Http\Controllers\IssueController::class,'create'])->middleware('auth');
Route::post('/issue',[\App\Http\Controllers\IssueController::class,'store']);
Route::get('issue/{issue}/edit', [\App\Http\Controllers\IssueController::class,'edit']);
Route::get('issue/{issue}/edit_dev', [\App\Http\Controllers\IssueController::class,'edit_dev']);
Route::put('/issue/{issue}',[\App\Http\Controllers\IssueController::class,'update']);
Route::put('/issue_dev/{issue}',[\App\Http\Controllers\IssueController::class,'update_dev']);

Route::delete('/issue/{issue}',[\App\Http\Controllers\IssueController::class,'destroy']);

Route::get('/login', [\App\Http\Controllers\AuthController::class,'create'])->name('login')->middleware('guest');

Route::post('/login', [\App\Http\Controllers\AuthController::class,'store'])->name('login.store');
Route::delete('/logout',[\App\Http\Controllers\AuthController::class,'destroy']);
/*
 * TODO: work on deleting/re-uploading files in edit view
 * TODO: work on adding route middleware based on role, and add action buttons by reading role in the User Object (c)
 * TODO: Work on filtering index results based on role (Create a role-specific index controller, redirect to it based on role upon login) (c)
 * TODO: show success flash messages (c)
 * TODO: Handle exceptions/validation views (c)
 * TODO: Work on Dev Status update view (Core Complete)
 *
 * */


