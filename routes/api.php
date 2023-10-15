<?php

use App\Http\Controllers\CreateApplicationController;
use App\Http\Controllers\DeleteApplicationController;
use App\Http\Controllers\IndexApplicationController;
use App\Http\Controllers\UpdateApplicationController;
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

Route::post('/createApplication', [CreateApplicationController::class, 'createApplication'])->name('createApplication');
Route::get('/getApplication', [IndexApplicationController::class, 'getApplicationById'])->name('indexApplication');
Route::delete('/deleteApplication', [DeleteApplicationController::class, 'deleteApplication'])->name('deleteApplication');
Route::patch('/updateApplication', [UpdateApplicationController::class, 'updateApplication'])->name('updateApplication');
