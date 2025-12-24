<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::latest()->get();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'tech_stack' => 'nullable|array', // Assuming checkbosses or JSON
            'image_url' => 'nullable|image|max:2048', // Allow file upload
            'project_url' => 'nullable|url',
            'github_url' => 'nullable|url',
        ]);

        // Handle Slug
        $validated['slug'] = Str::slug($validated['title']);

        // Handle File Upload
        if ($request->hasFile('image_url')) {
            $path = $request->file('image_url')->store('projects', 'public');
            $validated['image_url'] = '/storage/' . $path;
        }

        // Handle Tech Stack (convert array to JSON if needed, or string)
        // For simplicity, let's assume the DB expects a JSON castable array or valid string.
        // If the model casts it, we pass array. If not, json_encode.
        // We should check the model. Defaulting to passing strict input.

        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'tech_stack' => 'nullable|array',
            'image_url' => 'nullable|image|max:2048',
            'project_url' => 'nullable|url',
            'github_url' => 'nullable|url',
        ]);

        if ($request->has('title')) {
             $validated['slug'] = Str::slug($validated['title']);
        }

        if ($request->hasFile('image_url')) {
            // Delete old
            // Storage::disk('public')->delete(...)
            $path = $request->file('image_url')->store('projects', 'public');
            $validated['image_url'] = '/storage/' . $path;
        }

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }
}
