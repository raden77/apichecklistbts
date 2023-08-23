<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login', [App\Http\Controllers\AuthController::class, 'login']);
Route::post('register', [App\Http\Controllers\AuthController::class, 'register']);

Route::group(['middleware' => ['jwt.auth']], function () {
    // Your protected routes here
    Route::get('/checklist', [App\Http\Controllers\ChecklistController::class, 'show'])->name('show.checklist');
    Route::post('/checklist', [App\Http\Controllers\ChecklistController::class, 'create'])->name('create.checklist');
    Route::delete('/checklist/{checklistId}', [App\Http\Controllers\ChecklistController::class, 'delete'])->name('delete.checklist');

    Route::get('/checklist', [App\Http\Controllers\ChecklistController::class, 'show'])->name('show.checklist');
    Route::post('/checklist', [App\Http\Controllers\ChecklistController::class, 'create'])->name('create.checklist');
    Route::delete('/checklist/{checklistId}', [App\Http\Controllers\ChecklistController::class, 'delete'])->name('delete.checklist');

    Route::get('/checklist/{checklistId}/item', [App\Http\Controllers\ChecklistItemController::class, 'show'])->name('show.checklistitem');
    Route::get('/checklist/{checklistId}/item/{checklistItemId}', [App\Http\Controllers\ChecklistItemController::class, 'showItem'])->name('showItem.checklistitem');
    Route::delete('/checklist/{checklistId}/item/{checklistItemId}', [App\Http\Controllers\ChecklistItemController::class, 'deleteItem'])->name('deleteItem.checklistitem');
    Route::put('/checklist/{checklistId}/item/{checklistItemId}', [App\Http\Controllers\ChecklistItemController::class, 'updateItem'])->name('updateItem.checklistitem');
    Route::post('/checklist/{checklistId}/item', [App\Http\Controllers\ChecklistItemController::class, 'create'])->name('create.checklistitem');
    // Route::delete('/checklist/{checklistId}', [App\Http\Controllers\ChecklistItemController::class, 'delete'])->name('delete.checklistitem');

});
