<?php

namespace App\Http\Controllers;
use App\Models\Education;
use App\Models\Skill;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $educations = Education::all();
        return view('educations.index', compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $skills = Skill::all();
        return view('educations.create', compact('skills'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //dd($request->all());

        $request->validate([
            'institution' => ['required', 'string', 'max:255'],
            'programme' => 'required|string|max:255',
            'start_date' => 'required|date',
            'finish_date' => 'nullable|date|after_or_equal:start_date',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'grade' => 'nullable|string|max:10',
        ]);
    
        // Create Education
        $education = Education::create([
            'institution_name' => $request->institution,
            'programme'=> $request->programme,
            'started_at'=> $request->start_date,
            'finished_at'=> $request->finish_date,
            'location'=> $request->location,
            'description'=> $request->description,
            'grade'=> $request->grade,
        ]);
    
        // Attach Skills (if any are selected)
        if ($request->has('skills')) {
            $education->skills()->attach($request->skills);
        }
    
        return redirect()->route('educations.index')->with('success', 'Education added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $education = Education::findOrFail($id);
        return view('educations.show', compact('education'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $education = Education::findOrFail($id);
        return view('educations.edit', compact('education'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);
        $education = Education::findOrFail($id);
        $education->update($validatedData);
        return redirect()->route('educations.index')->with('success', 'Education updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $education = Education::findOrFail($id);
        $education->delete();
        return redirect()->route('educations.index')->with('success', 'Education deleted successfully!');
    }
}
