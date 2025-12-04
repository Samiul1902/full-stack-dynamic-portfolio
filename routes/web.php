<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectInfoController;
use App\Http\Controllers\AcademicInfoController;
use App\Http\Controllers\ResumeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| These routes handle all public pages of your portfolio.
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

// Projects list & single project detail
Route::get('/projects', [ProjectInfoController::class, 'index'])
    ->name('projects.index');

Route::get('/projects/{slug}', [ProjectInfoController::class, 'show'])
    ->name('projects.show');

// Academic info (study history + achievements) – optional separate page
Route::get('/academic', [AcademicInfoController::class, 'index'])
    ->name('academic.index');

// Resume download (used by route('resume.download') in Blade)
Route::get('/resume/download', [ResumeController::class, 'download'])
    ->name('resume.download');
