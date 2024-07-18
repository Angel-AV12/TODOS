<?php

use App\Http\Controllers\TodosController;
use App\Http\Controllers\categoriaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tareas', [TodosController::class, 'index'])->name('todos');
Route::post('/tareas', [TodosController::class, 'store'])->name('todos');
Route::get('/tareas/{id}', [TodosController::class, 'show'])->name('todos-edit');
Route::patch('/tareas/{id}', [TodosController::class, 'update'])->name('todos-update');
Route::delete('/tareas/{id}', [TodosController::class, 'destroy'])->name('todos-destroy');

Route::resource('categoria', categoriaController::class);
Route::get('/categoria/{id}', [TodosController::class, 'show'])->name('categoria-show');
