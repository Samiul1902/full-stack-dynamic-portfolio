<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Support\Facades\Storage;

class ResumeController extends Controller
{
    public function download()
    {
        // Get latest resume row from DB
        $resume = Resume::latest('published_at')->firstOrFail();

        // Check file on public disk
        if (! Storage::disk('public')->exists($resume->file_path)) {
            abort(404, 'Resume file not found');
        }

        // Download the file
        return Storage::disk('public')->download($resume->file_path);
    }
}
