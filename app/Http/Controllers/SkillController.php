<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Education;
use App\Models\Work;
use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::all()->sortByDesc('created_at');
        $skills->load('educations', 'works', 'tasks', 'projects');
        return view('skills.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // You can pass the related models for selection if needed
        // $educations = Education::all();
        // $works = Work::all();
        // $tasks = Task::all();
        // $projects = Project::all();
        
        return view('skills.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (! Auth::check()) {
            abort(403); // Forbidden
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => 'nullable|string',
        ]);

        // Create Skill
        $skill = Skill::create($request->except('educations'));

        // // Attach related models (if any are selected)
        // if ($request->has('educations')) {
        //     $skill->educations()->attach($request->educations);
        // }
        // if ($request->has('works')) {
        //     $skill->works()->attach($request->works);
        // }
        // if ($request->has('tasks')) {
        //     $skill->tasks()->attach($request->tasks);
        // }
        // if ($request->has('projects')) {
        //     $skill->projects()->attach($request->projects);
        // }

        return redirect()->route('skills.index')->with('success', 'Skill added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $skill = Skill::findOrFail($id);
        $skill->load('educations', 'works', 'tasks', 'projects');

        return view('skills.show', compact('skill'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $skill = Skill::findOrFail($id);
        // $educations = Education::all();
        // $works = Work::all();
        // $tasks = Task::all();
        // $projects = Project::all();
        
        // $skill->load('educations', 'works', 'tasks', 'projects');

        return view('skills.edit', compact('skill', ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (! Auth::check()) {
            abort(403); // Forbidden
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => 'nullable|string',
        ]);

        $skill = Skill::findOrFail($id);
        $skill->update($request->except(''));

        // Sync related models (if any are selected)
        // if ($request->has('educations')) {
        //     $skill->educations()->sync($request->educations);
        // } else {
        //     $skill->educations()->sync([]); // Clear educations if none selected
        // }
        // if ($request->has('works')) {
        //     $skill->works()->sync($request->works);
        // } else {
        //     $skill->works()->sync([]); // Clear works if none selected
        // }
        // if ($request->has('tasks')) {
        //     $skill->tasks()->sync($request->tasks);
        // } else {
        //     $skill->tasks()->sync([]); // Clear tasks if none selected
        // }
        // if ($request->has('projects')) {
        //     $skill->projects()->sync($request->projects);
        // } else {
        //     $skill->projects()->sync([]); // Clear projects if none selected
        // }

        return redirect()->route('skills.index')->with('success', 'Skill updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (! Auth::check()) {
            abort(403); // Forbidden
        }

        $skill = Skill::findOrFail($id);

        // Detach relationships
        $skill->educations()->detach();
        $skill->works()->detach();
        $skill->tasks()->detach();
        $skill->projects()->detach();

        $skill->delete();

        return redirect()->route('skills.index')->with('success', 'Skill deleted successfully!');
    }
}
