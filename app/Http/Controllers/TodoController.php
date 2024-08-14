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
        if(Auth::id() !== $todo->user_id) {
            abort(403);
        }

        return view('todo', [
            'todo' => $todo,
        ]);
    }

    public function create()
    {
        if(!Auth::user()) {
            return redirect('/login');
        }
        return view('create');
    }

    public function store()
    {
        $validated = request()->validate([
            'title' => ['required', 'min:3'],
            'body' => ['nullable'],
        ]);

        $userId = Auth::id();

        Todo::create([
            'title' => $validated['title'],
            'body' => $validated['body'],
            'user_id' => $userId,
            'completed' => false,
        ]);

        return redirect('/');
    }

    public function destroy(Todo $todo)
    {
        if(Auth::id() !== $todo->user_id) {
            abort(403);
        }

        $todo->delete();

        return redirect('/');
    }

    public function edit(Todo $todo)
    {
        if(Auth::id() !== $todo->user_id) {
            abort(403);
        }

        return view('edit', [
            'todo' => $todo,
        ]);
    }

    public function update(Todo $todo)
    {
        if(Auth::id() !== $todo->user_id) {
            abort(403);
        }

        request()->validate([
            'title' => ['required', 'min:3'],
            'body' => ['nullable'],
            'completed' => ['nullable', 'boolean'],
        ]);

        $todo->update([
            'title' => request('title'),
            'body' => request('body'),
            'completed' => request()->has('completed'),
        ]);

        return redirect('/todo/' . $todo->id);
    }

    public function complete(Todo $todo)
    {
        $todo->update([
           'completed' => !$todo->completed,
        ]);

        return redirect('/');
    }
}
