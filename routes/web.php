<?php

use App\Http\Controllers\TodoController;
use App\Models\Todo;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index', [
    'todos' => Todo::all()
]);

Route::get('todo/{todo}', [TodoController::class, 'show']);

Route::delete('todo/{todo}', [TodoController::class, 'destroy']);
