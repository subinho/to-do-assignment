<?php

use App\Models\Todo;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index', [
    'todos' => Todo::all()
]);
