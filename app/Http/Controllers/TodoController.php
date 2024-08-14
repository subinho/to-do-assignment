<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $todos = Todo::where('user_id', $userId)->get();

        return view('index  ', [
            'todos' => $todos,
        ]);
    }
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

    public function edit(Todo $todo)
    {
        return view('edit', [
            'todo' => $todo,
        ]);
    }

    public function update(Todo $todo)
    {

        request()->validate([
            'title' => ['required', 'min:3'],
            'body' => ['required'],
            'completed' => ['nullable', 'boolean'],
        ]);

        $todo->update([
            'title' => request('title'),
            'body' => request('body'),
            'completed' => request()->has('completed') ? true : false,
        ]);

        return redirect('/todo/' . $todo->id);
    }
}
