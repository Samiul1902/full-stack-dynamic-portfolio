<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Support\Facades\Storage;

class ResumeController extends Controller
{
    /**
     * Download the latest published resume file.
     */
    public function download()
    {
        // 1. Try to get the latest resume from the Database (Dynamic)
        $resume = Resume::orderBy('published_at', 'desc')->first();

        if ($resume && Storage::disk('public')->exists($resume->file_path)) {
            return Storage::disk('public')->download($resume->file_path, 'Samiul_Hasan_Sakib_CV.pdf');
        }

        // 2. JAM STACK FALLBACK:
        // If no dynamic resume is found, serve the static file we put in public/assets
        // This ensures the site NEVER breaks even if the DB is empty.
        $staticPath = public_path('assets/cv/Samiul_Hasan_Sakib_CV.pdf');
        
        if (file_exists($staticPath)) {
             return response()->download($staticPath, 'Samiul_Hasan_Sakib_CV.pdf');
        }
        
        // 3. Last Resort: Original storage location
        $fullPath = storage_path('app/public/cv/samiul_cv.pdf');

        if (!file_exists($fullPath)) {
            abort(404, 'Resume file not found.');
        }

        return response()->download($fullPath, 'Samiul_Hasan_Sakib_CV.pdf');
    }
}
