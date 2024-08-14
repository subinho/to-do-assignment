<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TodoController;
use App\Models\Todo;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index', [
    'todos' => Todo::all()
]);


Route::get('todo/{todo}', [TodoController::class, 'show']);
Route::get('todo/{todo}/edit', [TodoController::class, 'edit']);

Route::patch('todo/{todo}', [TodoController::class, 'update']);
Route::delete('todo/{todo}', [TodoController::class, 'destroy']);

Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);
