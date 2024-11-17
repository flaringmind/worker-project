<?php

use App\Http\Controllers\WorkerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/workers', [WorkerController::class, 'index'])->name('worker.index');

Route::get('/workers/create', [WorkerController::class, 'create'])->name('worker.create');

Route::post('/workers', [WorkerController::class, 'store'])->name('worker.store');

Route::get('/workers/{worker}', [WorkerController::class, 'show'])->name('worker.show');

Route::get('/workers/{worker}/edit', [WorkerController::class, 'edit'])->name('worker.edit');

Route::patch('/workers/{worker}', [WorkerController::class, 'update'])->name('worker.update');

Route::delete('/workers/{worker}', [WorkerController::class, 'delete'])->name('worker.delete');

