@extends('layouts.app')

@section('title', 'Samiul • Full‑Stack Portfolio')

@section('content')
<section id="home" class="hero">
    <div class="container hero-grid">
        <div class="hero-left">
            <h1>Hi, I'm Samiul</h1>

            <p class="hero-about">
                A CSE student passionate about full‑stack web development, deep learning for medical
                imaging, and IoT projects like RC tanks and smart systems.
            </p>

            <div class="hero-buttons">
                <a href="#projects" class="btn-primary">View Projects</a>
                @if($resume)
                    <a href="{{ route('resume.download') }}" class="btn-primary btn-outline">
                        Download CV
                    </a>
                @endif
            </div>
        </div>

        <div class="hero-right">
            <div class="hero-avatar-wrap">
                <img
                    src="{{ asset('images/481773494_3447077962266966_1117281271806353893_n.jpg') }}"
                    alt="Samiul profile photo"
                    class="hero-avatar"
                >
            </div>
        </div>
    </div>
</section>

{{-- FEATURED PROJECTS --}}
<section id="projects">
    <div class="container">
        <h2 class="section-title">Featured Projects</h2>

        @if($featuredProjects->isEmpty())
            <p>No projects added yet.</p>
        @else
            <div class="projects-grid">
                @foreach($featuredProjects as $project)
                    <article class="project-card fade-hidden">
                        <h3>{{ $project->title }}</h3>
                        <p class="project-category">{{ strtoupper($project->category ?? 'GENERAL') }}</p>
                        <p class="project-desc">{{ $project->short_description }}</p>

                        @if($project->tech_stack)
                            <div class="project-tags">
                                @foreach($project->tech_stack as $tech)
                                    <span class="tag">{{ $tech }}</span>
                                @endforeach
                            </div>
                        @endif

                        <div class="project-links">
                            @if($project->github_url)
                                <a href="{{ $project->github_url }}" target="_blank" class="btn-outline">
                                    GitHub
                                </a>
                            @endif
                            @if($project->live_url)
                                <a href="{{ $project->live_url }}" target="_blank" class="btn-primary">
                                    Live Demo
                                </a>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
        @endif
    </div>
</section>

{{-- SKILLS (debug-simple version) --}}
<section id="skills">
    <div class="container">
        <h2 class="section-title">Skills</h2>

        @if($skills->isEmpty())
            <p>No skills found in database.</p>
        @else
            @php
                $grouped = $skills->groupBy('category');
            @endphp

            <div class="skills-grid">
                @foreach($grouped as $category => $items)
                    <div class="skill-card">
                        <h3 class="skill-category-title">{{ ucfirst($category) }}</h3>

                        @foreach($items as $skill)
                            <div class="skill-line" style="--level: {{ $skill->level }}%;">
                                <div class="skill-line-header">
                                    <span class="skill-name">{{ $skill->name }}</span>
                                    <span class="skill-percent">{{ $skill->level }}%</span>
                                </div>
                                <div class="skill-bar-track">
                                    <div class="skill-bar-fill"></div>
                                    <div class="skill-bar-knob"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>


{{-- STUDY HISTORY --}}
<section id="study">
    <div class="container">
        <h2 class="section-title">Study History</h2>
        <div class="timeline">
            @foreach($study as $item)
                <div class="timeline-item fade-hidden">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <div class="timeline-date">
                            {{ $item->start_year }} – {{ $item->end_year ?? 'Present' }}
                        </div>
                        <h3>{{ $item->level }}</h3>
                        <p class="timeline-inst">{{ $item->institution }}</p>
                        @if($item->grade)
                            <p class="timeline-grade">{{ $item->grade }}</p>
                        @endif
                        @if($item->details)
                            <p class="timeline-text">{{ $item->details }}</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ACHIEVEMENTS --}}
<section id="achievements">
    <div class="container">
        <h2 class="section-title">Academic Achievements</h2>
        <div class="timeline">
            @foreach($achievements as $ach)
                <div class="timeline-item fade-hidden">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <div class="timeline-date">
                            {{ optional($ach->achieved_at)->format('M Y') ?? 'N/A' }}
                        </div>
                        <h3>{{ $ach->title }}</h3>
                        @if($ach->institution)
                            <p class="timeline-inst">{{ $ach->institution }}</p>
                        @endif
                        @if($ach->description)
                            <p class="timeline-text">{{ $ach->description }}</p>
                        @endif
                        @if($ach->certificate_url)
                            <a href="{{ $ach->certificate_url }}" target="_blank" class="cert-link">
                                View Certificate →
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- RESUME + CONTACT --}}
<section id="resume">
    <div class="container">
        <h2 class="section-title">CV / Resume</h2>
        @if($resume)
            <p>{{ $resume->headline }}</p>
            <a href="{{ route('resume.download') }}" class="btn-primary">
                Download Latest CV
            </a>
        @else
            <p>Resume will be uploaded soon.</p>
        @endif
    </div>
</section>

<section id="contact">
    <div class="container">
        <h2 class="section-title">Contact</h2>
        <p>Email: sakib22205101472@diu.edu.bd</p>
        <p>Contact Number: 01902962692</p>
        <p>Facebook ID: 01902962692</p>
        <p>LinkedIn ID: 01902962692</p>
        <p>Github: 01902962692</p>

    </div>
</section>
@endsection
