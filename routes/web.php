<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
// project
Route::get('/project', [ProjectController::class, 'index'])->name('project')->middleware('auth');

Route::get('/new-project', function(){
    return view('new-project');
})->name('new-project');

Route::post('/new-project', [ProjectController::class, 'store'])->name('store')->middleware('auth');
Route::get('/project/{id}/edit', [ProjectController::class, 'edit'])->name('project.edit');
Route::put('/project/{id}/edit',[ProjectController::class, 'update'])->name('project.update');
Route::delete('project/{id}',[ProjectController::class, 'destroy'])->name('project.destroy');
// users
// Route::get('/users', function(){
//     return view('users');
// })->name('users');
Route::get('/users', [UserController::class, 'index'])->name('users')->middleware('auth');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy')->middleware('auth');
// client
// client
Route::get('/clients', [ClientController::class, 'index'])->name('clients')->middleware('auth');

Route::get('/new-client', function(){
    return view('new-client');
})->name('new-client');

Route::post('/new-client', [ClientController::class, 'store'])->name('store')->middleware('auth');
Route::get('/clients/{id}/edit', [ClientController::class, 'edit'])->name('edit');
Route::put('clients/{id}/edit',[ClientController::class, 'update'])->name('update');
Route::delete('clients/{id}',[ClientController::class, 'destroy'])->name('destroy');
// task
Route::get('/tasks', function(){
    return view('tasks');
})->name('tasks');
