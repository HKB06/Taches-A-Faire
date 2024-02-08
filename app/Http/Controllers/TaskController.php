<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Http\Requests\TaskRequest; 

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $query = Task::query();


        \Log::info('Status filter:', ['status' => $request->status]);

    
        // Filtrage V2
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }
    
        // Tri V2
        if ($request->has('sort')) {
            $query->orderBy($request->sort, 'asc'); // ou 'desc' pour un tri décroissant
        }
    
        $tasks = $query->get();
    
        return view('tasks.index', compact('tasks'));
    }
    

    public function create()
    {
        return view('tasks.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string',
        ]);

    $task = new Task();
    $task->name = $request->name;
    $task->description = $request->description;
    $task->status = $request->status; 
    $task->save();

    return redirect()->route('tasks.index')->with('success', 'Tâche créée avec succès.');
}

    public function show($id)
    {
        $task = Task::find($id);
        return view('tasks.show', compact('task'));
    }

    public function edit($id)
    {
        $task = Task::find($id);
        return view('tasks.edit', compact('task'));
    }



    public function update(Request $request, Task $task)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'status' => 'required|string',
    ]);

    $task->update([
        'name' => $request->name,
        'description' => $request->description,
        'status' => $request->status,
    ]);

    return redirect()->route('tasks.index')->with('success', 'Tâche mise à jour avec succès.');
}


    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()->route('tasks.index');
    }
}



