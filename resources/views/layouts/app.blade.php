<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name', 'Samiul Portfolio'))</title>
        <link rel="icon" type="image/jpeg" href="{{ asset('images/481773494_3447077962266966_1117281271806353893_n.jpg') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
        <script>
            tailwind.config = {
                darkMode: 'class',
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['Outfit', 'Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                        },
                        colors: {
                            slate: {
                                850: '#151e32',
                                900: '#0f172a',
                                950: '#020617',
                            }
                        }
                    },
                },
            }
        </script>
        <style>
            /* Custom Scrollbar */
            ::-webkit-scrollbar {
                width: 10px;
            }
            ::-webkit-scrollbar-track {
                background: #0f172a; 
            }
            ::-webkit-scrollbar-thumb {
                background: #334155; 
                border-radius: 5px;
            }
            ::-webkit-scrollbar-thumb:hover {
                background: #475569; 
            }
        </style>
        <script src="//unpkg.com/alpinejs" defer></script>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen {{ (request()->is('/') || request()->routeIs('home')) ? '' : 'bg-slate-950' }}">
            @if (request()->is('/') || request()->routeIs('home'))
                @include('partials.header')
            @else
                @include('layouts.navigation')
                <div class="h-20"></div> <!-- Spacer for fixed nav -->
            @endif

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-slate-900 border-b border-slate-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                @if (isset($slot))
                    {{ $slot }}
                @else
                    @yield('content')
                @endif
            </main>
        </div>
    </body>
</html>
