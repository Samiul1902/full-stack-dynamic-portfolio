<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use App\Models\StudyHistory;
use App\Models\Achievement;
use App\Models\Resume;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProjects = Project::where('is_featured', true)
            ->orderBy('display_order')
            ->take(3)
            ->get();

        $skills = Skill::orderBy('category')
            ->orderByDesc('level')
            ->get();

        $study = StudyHistory::orderByDesc('start_year')->get();
        $achievements = Achievement::orderByDesc('achieved_at')->get();
        $resume = Resume::latest('published_at')->first();

        return view('home', compact(
            'featuredProjects',
            'skills',
            'study',
            'achievements',
            'resume'
        ));
    }
}
