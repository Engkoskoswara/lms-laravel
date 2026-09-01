<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('home');
});
Route::get('/tentang', function () {
    return view('tentang');
});
Route::get('/portofolio', function () {
    return view('portofolio');
});
// Rute untuk LMS Tugas
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
// Rute untuk menghapus tugas 🗑️
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');


