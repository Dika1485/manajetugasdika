<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return redirect(url('/tasks'));
});
Route::get('/tasks', [TaskController::class, 'read']);
Route::post('/tasks', [TaskController::class, 'create']);
Route::get('/tasks/completed',[TaskController::class, 'read_com']);
Route::get('/tasks/incompleted',[TaskController::class, 'read_incom']);
Route::get('/tasks/{id}',[TaskController::class, 'read_id']);
Route::put('/tasks/{id}',[TaskController::class, 'update']);
Route::delete('/tasks/{id}',[TaskController::class, 'delete']);
Route::put('/tasks/{id}/status',[TaskController::class, 'update_status']);
