<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function show(Todo $todo)
    {
        return view('todo', [
            'todo' => $todo,
        ]);
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect('/');
    }
}
