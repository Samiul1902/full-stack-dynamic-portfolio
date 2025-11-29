@extends('layouts.main')
@section("body")
<style>
    /* ===== MAIN / BODY ===== */

    body{
        background: #050816;
        color: #f9fafb;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
    }

    main{
        width: 100%;
        min-height: calc(100vh - 70px);
    }

    /* HERO LAYOUT */

    .hero{
        max-width: 1100px;
        margin: 0 auto;
        padding: 80px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 40px;
    }

    /* Text side */

    .hero-content{
        flex: 1;
    }

    .hero-tagline{
        font-size: 14px;
        letter-spacing: 4px;
        text-transform: uppercase;
        color: #9ca3af;
        margin-bottom: 8px;
    }

    .hero h1{
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 4px;
    }

    .hero h2{
        font-size: 20px;
        font-weight: 500;
        color: #a5b4fc;
    }

    .hero-text{
        max-width: 520px;
        font-size: 15px;
        line-height: 1.6;
        color: #d1d5db;
        margin-top: 12px;
    }

    /* Buttons */

    .hero-buttons{
        margin-top: 24px;
        display: flex;
        gap: 12px;
    }

    .hero-buttons a{
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
        padding: 10px 20px;
        border-radius: 999px;
        border: 1px solid #22c55e;
        color: #050816;
        background: #22c55e;
        transition: 0.2s ease;
    }

    .hero-buttons a.secondary{
        background: transparent;
        color: #f9fafb;
        border-color: #4b5563;
    }

    .hero-buttons a:hover{
        transform: translateY(-1px);
        filter: brightness(1.05);
    }

    /* IMAGE WITH ANIMATION */

    .hero-image-wrapper{
        flex: 0 0 260px;
        display: flex;
        justify-content: center;
    }

    .hero-image-card{
        width: 260px;
        height: 260px;
        border-radius: 24px;
        overflow: hidden;
        position: relative;
        background: radial-gradient(circle at top left, #22c55e 0, #050816 60%);
        box-shadow: 0 20px 45px rgba(0, 0, 0, 0.6);
        transform: translateY(0);
        transition: transform 0.4s ease, box-shadow 0.4s ease;
        animation: float 4s ease-in-out infinite;
    }

    .hero-image-card::before{
        content: "";
        position: absolute;
        inset: 10px;
        border-radius: 20px;
        border: 1px solid rgba(148, 163, 184, 0.6);
        pointer-events: none;
    }

    .hero-image-card img{
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        border-radius: 24px;
    }

    .hero-image-card:hover{
        animation-play-state: paused;
        transform: translateY(-6px);
        box-shadow: 0 26px 60px rgba(34, 197, 94, 0.45);
    }

    /* Floating animation */

    @keyframes float{
        0%   { transform: translateY(0); }
        50%  { transform: translateY(-8px); }
        100% { transform: translateY(0); }
    }

    /* SECTIONS AFTER HERO */

    .section{
        max-width: 1100px;
        margin: 0 auto;
        padding: 60px 20px;
    }

    .section h2{
        font-size: 24px;
        margin-bottom: 16px;
    }

    .section p{
        font-size: 15px;
        color: #d1d5db;
    }

    /* RESPONSIVE */

    @media (max-width: 768px){
        .hero{
            flex-direction: column;
            padding-top: 60px;
            text-align: left;
        }

        .hero-image-wrapper{
            order: -1; /* image on top on mobile (optional) */
        }
    }


</style>
<main>
    <!-- HERO SECTION -->
    <section class="hero" id="home">
        <div class="hero-content">
            <p class="hero-tagline">Hello, I'm</p>
            <h1 id="name">Samiul Hasan Sakib</h1>
            <h2>Full-Stack Web Developer</h2>

            <p class="hero-text">
                I build clean, responsive web applications using modern technologies.
                This portfolio showcases my skills, projects, and experience as a developer.
            </p>

            <div class="hero-buttons">
                <a href="#projects">View Projects</a>
                <a href="#skills" class="secondary">View Skills</a>
            </div>
        </div>

        <div class="hero-image-wrapper">
            <div class="hero-image-card">
                <!-- Put your own image here -->
                <img src="/images/481773494_3447077962266966_1117281271806353893_n.jpg" alt="Samiul Hasan Sakib">
            </div>
        </div>
    </section>

    <!-- SKILLS SECTION -->
    <section class="section" id="skills">
        @include('pages.skills')
    </section>

    <!-- PROJECTS SECTION -->
    <section class="section" id="projects">
        @include('pages.project')
    </section>
</main>


@endsection
