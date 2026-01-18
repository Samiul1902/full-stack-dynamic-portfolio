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
        // Try to get from DB to check logic, but prefer strict file path for reliability
        $resume = Resume::latest('published_at')->first();
        $filePath = $resume ? $resume->file_path : 'cv/samiul_cv.pdf';
        
        // Ensure we are using the correct absolute path for response()->download
        // Storage::disk('public')->path() gives the full server path
        $fullPath = Storage::disk('public')->path($filePath);

        if (!file_exists($fullPath)) {
            abort(404, 'Resume file not found');
        }

        // Force download with specific name using standard naming
        return response()->download($fullPath, 'Samiul_Hasan_Sakib_CV.pdf', [
            'Content-Type' => 'application/pdf',
        ]);
    }
}
