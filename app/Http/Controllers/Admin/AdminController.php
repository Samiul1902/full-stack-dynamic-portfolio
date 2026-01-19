<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Skill;
use App\Models\StudyHistory;
use App\Models\Achievement;

class AdminController extends Controller
{
    public function index()
    {
        $projectCount = Project::count();
        $skillCount = Skill::count();
        $studyCount = StudyHistory::count();
        $achievementCount = Achievement::count();
        $resumeCount = \App\Models\Resume::count();
        
        return view('admin.dashboard', compact('projectCount', 'skillCount', 'studyCount', 'achievementCount', 'resumeCount'));
    }
}
