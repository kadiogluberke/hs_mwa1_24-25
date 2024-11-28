<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $works = Work::all()->map(function ($work) {
            $work->started_at = Carbon::parse($work->started_at)->format('M - Y');
            $work->finished_at = Carbon::parse($work->finished_at)->format('M - Y');
            return $work;
        });
        $works->load('skills', 'tasks');
        return view('works.index', compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $skills = Skill::all();
        $taskPlaceholders = range(0, 4);
        return view('works.create', compact('skills', 'taskPlaceholders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            abort(403); // Forbidden
        }
        // dd($request->all());

        $request->validate([
            'institution_name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'started_at' => ['required', 'date'],
            'finished_at' => ['nullable', 'date', 'after_or_equal:started_at'],
            'location' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ]);

        $task = $request->input('task');
        if (empty($task['name'])) {
            return redirect()->back()->withErrors(['task.name' => 'Task name is required'])->withInput();
        }

        // Create Work
        $work = Work::create($request->except('skills', 'task'));

        // Attach Skills (if any are selected)
        if ($request->has('skills')) {
            $work->skills()->attach($request->skills);
        }

        // dd($request);

        $work->tasks()->create([
            'name' => $task['name'],
            'description' => $task['description'],
        ]);

        return redirect()->route('works.index')->with('success', 'Work added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $work = Work::findOrFail($id);
        $work->started_at = Carbon::parse($work->started_at)->format('M - Y');
        $work->finished_at = Carbon::parse($work->finished_at)->format('M - Y');

        $work->load('skills', 'tasks');
        return view('works.show', compact('work'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $work = Work::findOrFail($id);
        $skills = Skill::all();
        $work->load('skills');
        return view('works.edit', compact('work', 'skills'));
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
            'institution_name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'started_at' => ['required', 'date'],
            'finished_at' => ['nullable', 'date', 'after_or_equal:started_at'],
            'location' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ]);

        $work = Work::findOrFail($id);

        $work->update($request->except('skills'));

        // Sync the selected skills
        if ($request->has('skills')) {
            $work->skills()->sync($request->input('skills'));
        } else {
            $work->skills()->sync([]); // Clear skills if none selected
        }

        return redirect()->route('works.index')->with('success', 'Work updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!Auth::check()) {
            abort(403); // Forbidden
        }

        $work = Work::findOrFail($id);

        $work->skills()->detach(); // Detach related skills
        $work->tasks()->delete();  // Delete related tasks

        $work->delete();

        return redirect()->route('works.index')->with('success', 'Work deleted successfully!');
    }
}
