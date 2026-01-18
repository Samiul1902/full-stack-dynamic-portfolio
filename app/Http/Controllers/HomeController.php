<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use App\Models\StudyHistory;
use App\Models\Achievement;
use App\Models\Resume;

class HomeController extends Controller
{
    /**
     * Display the main portfolio page.
     */
    public function index()
    {
        // All featured projects sorted by display_order
        $featuredProjects = Project::where('is_featured', true)
            ->orderBy('display_order')
            ->get();

        // All skills sorted by category then level
        $skills = Skill::orderBy('category')
            ->orderByDesc('level')
            ->get();

        // Study history and achievements
        $study = StudyHistory::orderByDesc('start_year')->get();
        $achievements = Achievement::orderByDesc('achieved_at')->get();

        // Latest resume entry or check for file existence
        $resume = Resume::latest('published_at')->first();
        $hasResume = $resume || \Illuminate\Support\Facades\Storage::disk('public')->exists('cv/samiul_cv.pdf');

        // Pass everything to the home view
        return view('home', compact(
            'featuredProjects',
            'skills',
            'study',
            'achievements',
            'resume',
            'hasResume'
        ));
    }
}
