<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectInfoController;
use App\Http\Controllers\AcademicInfoController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public Portfolio Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/projects', [ProjectInfoController::class, 'index'])->name('projects.index');
Route::get('/projects/{slug}', [ProjectInfoController::class, 'show'])->name('projects.show');

Route::get('/academic', [AcademicInfoController::class, 'index'])->name('academic.index');
Route::get('/academic', [AcademicInfoController::class, 'index'])->name('academic.index');

// Contact Form
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Download CV Route
Route::get('/resume/download', [ResumeController::class, 'download'])->name('resume.download');

// Authentication / Admin Routes

// Dashboard (redirects to admin home or shows generic dashboard)
Route::get('/dashboard', [AdminController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    // Admin Dashboard (alias for /dashboard if needed, or separate)
    // Route::get('/', [AdminController::class, 'index'])->name('index'); 
    
    // Project Management
    Route::resource('projects', ProjectController::class);
    
    // Skill Management
    Route::resource('skills', \App\Http\Controllers\Admin\SkillController::class);

    // Study History Management
    Route::resource('study-history', \App\Http\Controllers\Admin\StudyHistoryController::class);

    // Achievement Management
    Route::resource('achievements', \App\Http\Controllers\Admin\AchievementController::class);

    // Resume Management
    Route::resource('resumes', \App\Http\Controllers\Admin\ResumeController::class);

    // Testimonial Management
    Route::resource('testimonials', \App\Http\Controllers\Admin\TestimonialController::class);

    // Blog System
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('posts', \App\Http\Controllers\Admin\PostController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



