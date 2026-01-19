<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resumes = Resume::orderBy('published_at', 'desc')->get();
        return view('admin.resumes.index', compact('resumes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.resumes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf|max:10240', // Max 10MB
            'headline' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('cv', 'public');

            Resume::create([
                'file_path' => $path,
                'headline' => $request->headline ?? 'Resume Uploaded on ' . now()->toFormattedDateString(),
                'published_at' => now(),
            ]);

            return redirect()->route('admin.resumes.index')->with('success', 'Resume uploaded successfully.');
        }

        return back()->with('error', 'File upload failed.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resume $resume)
    {
        if (Storage::disk('public')->exists($resume->file_path)) {
            Storage::disk('public')->delete($resume->file_path);
        }
        
        $resume->delete();

        return redirect()->route('admin.resumes.index')->with('success', 'Resume deleted.');
    }
}
