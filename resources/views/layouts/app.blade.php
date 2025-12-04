<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Samiul • Full‑Stack Portfolio')</title>

    {{-- Favicon: place favicon.png in public/ or adjust path --}}
    <link rel="icon" type="image/png" href="{{ asset('images/481773494_3447077962266966_1117281271806353893_n.jpg') }}">
    {{-- If you use /public/images/favicon.png instead, use: --}}
    {{-- <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}"> --}}

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header class="navbar">
        <div class="container nav-inner">
            <div class="logo">Samiul • Portfolio</div>
            <nav>
                <a href="#home">Home</a>
                <a href="#projects">Projects</a>
                <a href="#skills">Skills</a>
                <a href="#study">Study History</a>
                <a href="#achievements">Achievements</a>
                <a href="#resume">CV</a>
                <a href="#contact">Contact</a>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; {{ date('Y') }} Samiul. All rights reserved.</p>
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
