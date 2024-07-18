<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use  Iluminate\Database\Eloquent;

class TodosController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3'
        ]);

        $todo = new Todo();
        $todo->title = $request->title;
        $todo->save();
        return redirect()->route('todos')->with('success', 'Tarea creada exitosamente');
    }

    public function index()
    {
        $todos = Todo::all();
        return view('todos.index', ['todos' => $todos]);
    }

    public function show($id)
    {
        $todos = Todo::find($id);
        return view('todos.show', ['todos' => $todos]);
    }

    public function update(Request $request, $id)
    {
        $todos = Todo::find($id);
        $todos->title = $request->title;
        $todos->save();
        // return view('todos.index', ['success' => 'Tareas Actualizada']);
        return redirect()->route('todos')->with('success', 'Tareas asignada correctamente');
    }

    public function destroy($id)
    {
        $todos = Todo::find($id);
        $todos->delete();
        return redirect()->route('todos')->with('success', 'La tarea ha sido eliminada');
    }
}
