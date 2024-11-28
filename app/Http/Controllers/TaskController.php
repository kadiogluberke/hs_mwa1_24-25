<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Work;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::with('work')->get();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if (!($request->has('work_id'))){
            if (!Auth::check()) {
                abort(404); 
            }
        }

        $works = Work::all(); 
        $skills = Skill::all(); 

        $workId = $request->get('work_id'); 
        $work = Work::findOrFail($workId);

        return view('tasks.create', compact('works', 'workId', 'skills', 'work'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            abort(403); // Forbidden
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'work_id' => 'required|exists:works,id',
        ]);


        $task = Task::create($request->except('skills'));
    
        // Attach Skills (if any are selected)
        if ($request->has('skills')) {
            $task->skills()->attach($request->skills);
        }

        return redirect()->route('works.edit', $request->work_id)
                     ->with('success', 'Task added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::with('work')->findOrFail($id); // Include the related Work model
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::findOrFail($id);
        $works = Work::all(); // Fetch all works for the dropdown
        return view('tasks.edit', compact('task', 'works'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!Auth::check()) {
            abort(403); // Forbidden
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'work_id' => 'required|exists:works,id',
        ]);

        $task = Task::findOrFail($id);
        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!Auth::check()) {
            abort(403); // Forbidden
        }

        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }
}
