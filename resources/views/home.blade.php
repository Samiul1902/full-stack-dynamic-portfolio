@extends('layouts.app')

@section('title', 'Samiul • Full‑Stack Portfolio')

@section('content')
<section id="home" class="hero">
    <div class="container hero-grid">
        <div class="hero-left">
            <h1>Hi, I'm Samiul</h1>
            <p>
                Computer Science student working on full‑stack web apps, 
                machine learning, and IoT/RC tank projects.
            </p>
            <div class="hero-buttons">
                <a href="#projects" class="btn-primary">View Projects</a>
                <a href="#resume" class="btn-primary btn-outline">Download CV</a>
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

{{-- keep the rest of your sections below unchanged --}}
<section id="projects">
    <div class="container">
        <h2 class="section-title">Projects</h2>
        <p>Later this will show cards fetched from the database for your GitHub projects.</p>
    </div>
</section>

<section id="skills">
    <div class="container">
        <h2 class="section-title">Skills</h2>
        <p>Here we will add animated skill bars from the skills table.</p>
    </div>
</section>

<section id="study">
    <div class="container">
        <h2 class="section-title">Study History</h2>
        <p>This section will become an education timeline driven from the study_histories table.</p>
    </div>
</section>

<section id="achievements">
    <div class="container">
        <h2 class="section-title">Academic Achievements</h2>
        <p>Dean’s list, competitions, and course certificates will appear here.</p>
    </div>
</section>

<section id="resume">
    <div class="container">
        <h2 class="section-title">CV / Resume</h2>
        <p>We will add a real “Download CV” link here pointing to a stored PDF.</p>
    </div>
</section>

<section id="contact">
    <div class="container">
        <h2 class="section-title">Contact</h2>
        <p>Email: your.email@example.com</p>
    </div>
</section>
@endsection
