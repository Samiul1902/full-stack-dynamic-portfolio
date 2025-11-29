@extends('layouts.main')
@section("content")
<style>
    /* MAIN BODY / HERO SECTION */
    main{
        width: 100%;
        background: #050816;
        color: #f9fafb;
        min-height: calc(100vh - 70px);
    }

    .hero{
        max-width: 1100px;
        margin: 0 auto;
        padding: 80px 20px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 16px;
    }

    .hero-tagline{
        font-size: 14px;
        letter-spacing: 4px;
        text-transform: uppercase;
        color: #9ca3af;
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
        margin-top: 8px;
    }

    .hero-buttons{
        margin-top: 20px;
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

    /* Optional: smooth section spacing for #skills, #projects later */
    .section{
        max-width: 1100px;
        margin: 0 auto;
        padding: 60px 20px;
    }

</style>
<main>
    <section class="hero" id="home">
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
    </section>

    <!-- Example placeholders for sections your navbar links to -->
    <section class="section" id="skills">
        <h2>Skills</h2>
        <!-- your skills content -->
    </section>

    <section class="section" id="projects">
        <h2>Projects</h2>
        <!-- your projects content -->
    </section>
</main>

@endsection
