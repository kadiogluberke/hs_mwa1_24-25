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
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);
        Education::create($validatedData);
        return redirect()->route('educations.index')->with('success', 'Education created successfully!');
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
