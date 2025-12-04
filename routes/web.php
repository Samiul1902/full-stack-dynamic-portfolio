<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectInfoController;
use App\Http\Controllers\AcademicInfoController;
use App\Http\Controllers\ResumeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/projects', [ProjectInfoController::class, 'index'])->name('projects.index');
Route::get('/projects/{slug}', [ProjectInfoController::class, 'show'])->name('projects.show');

Route::get('/academic', [AcademicInfoController::class, 'index'])->name('academic.index');

// NEW: route used by route('resume.download')
Route::get('/resume/download', [ResumeController::class, 'download'])
    ->name('resume.download');
