<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

Route::get('/', function () {
    return view('welcome');
});

//RUTA PARA GENERERAR EL PDF
Route::get('projects/pdf', [ProjectController::class, 'pdf'])->name('projects/pdf');

//RUTAS PARA EL CRUD
Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects/create');
Route::post('/projects/save', [ProjectController::class, 'save'])->name('projects/save');
Route::get('/projects/edit/{id}', [ProjectController::class, 'edit'])->name('projects/edit');
Route::put('/projects/edit/{id}', [ProjectController::class, 'update'])->name('projects/update');
Route::get('/projects/delete/{id}', [ProjectController::class, 'delete'])->name('projects/delete');

Route::get('dashboard', function () {
    return view('/dashboard');
})->middleware(['auth', 'verified'])->name('/dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';

