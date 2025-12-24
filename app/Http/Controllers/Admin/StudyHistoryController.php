<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudyHistory;
use Illuminate\Http\Request;

class StudyHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studyHistories = StudyHistory::latest()->get();
        return view('admin.study-history.index', compact('studyHistories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.study-history.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'level' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'start_year' => 'required|digits:4|integer|min:1900|max:'.(date('Y')+5),
            'end_year' => 'nullable|digits:4|integer|min:1900|max:'.(date('Y')+10).'|gte:start_year',
            'grade' => 'nullable|string|max:50',
            'details' => 'nullable|string',
        ]);

        StudyHistory::create($validated);

        return redirect()->route('admin.study-history.index')
            ->with('success', 'Study history added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudyHistory $studyHistory)
    {
        return view('admin.study-history.edit', compact('studyHistory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudyHistory $studyHistory)
    {
        $validated = $request->validate([
            'level' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'start_year' => 'required|digits:4|integer|min:1900|max:'.(date('Y')+5),
            'end_year' => 'nullable|digits:4|integer|min:1900|max:'.(date('Y')+10).'|gte:start_year',
            'grade' => 'nullable|string|max:50',
            'details' => 'nullable|string',
        ]);

        $studyHistory->update($validated);

        return redirect()->route('admin.study-history.index')
            ->with('success', 'Study history updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudyHistory $studyHistory)
    {
        $studyHistory->delete();

        return redirect()->route('admin.study-history.index')
            ->with('success', 'Study history deleted successfully.');
    }
}
