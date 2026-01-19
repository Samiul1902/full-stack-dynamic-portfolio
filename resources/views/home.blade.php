@extends('layouts.app')

@section('title', 'Samiul • Full-Stack Visionary')

@section('content')
<!-- Custom Styles for Animations & Glassmorphism -->
<style>
    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
        100% { transform: translateY(0px); }
    }
    @keyframes blob {
        0% { transform: translate(0px, 0px) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
        100% { transform: translate(0px, 0px) scale(1); }
    }
    @keyframes shine {
        100% { left: 125%; }
    }
    @keyframes background-pan {
        0% { background-position: 0% center; }
        100% { background-position: 200% center; }
    }
    .animate-float { animation: float 6s ease-in-out infinite; }
    .animate-blob { animation: blob 7s infinite; }
    .animate-shine { animation: shine 1s; }
    .animate-text-flow {
        background-size: 200% auto;
        animation: background-pan 3s linear infinite;
    }
    .animation-delay-2000 { animation-delay: 2s; }
    .animation-delay-4000 { animation-delay: 4s; }
    
    .glass-card {
        background: rgba(255, 255, 255, 0.03);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.05);
        transition: all 0.3s ease;
    }
    .glass-card:hover {
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.15);
        box-shadow: 0 0 30px rgba(139, 92, 246, 0.2);
        transform: translateY(-5px);
    }
    
    .text-gradient {
        background: linear-gradient(to right, #818cf8, #c084fc, #f472b6, #818cf8);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-size: 200% auto;
        animation: background-pan 3s linear infinite;
    }

    /* Typing Effect Cursor */
    .typing-cursor::after {
        content: '|';
        animation: blink 1s step-start infinite;
    }
    @keyframes blink { 50% { opacity: 0; } }

    /* 3D Scroll Reveal */
    .reveal-3d {
        opacity: 0;
        transform: perspective(1000px) rotateX(30deg) translateY(100px) scale(0.9);
        transition: all 1s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    .reveal-3d-active {
        opacity: 1;
        transform: perspective(1000px) rotateX(0) translateY(0) scale(1);
    }
    
    /* 3D Depth Utilities */
    .transform-preserve-3d { transform-style: preserve-3d; }
    .translate-z-10 { transform: translateZ(40px); }
    .translate-z-5 { transform: translateZ(20px); }
</style>

<div class="bg-slate-950 min-h-screen text-white overflow-x-hidden selection:bg-indigo-500 selection:text-white" x-data="{ scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 50)">

    <!-- 3D Background Canvas -->
    <canvas id="bg-canvas" class="fixed inset-0 z-0 w-full h-full pointer-events-none"></canvas>

    <!-- Background Decoration (Fallback/Overlay) -->
    <div class="fixed inset-0 z-0 pointer-events-none overflow-hidden opacity-40">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
        <div class="absolute top-0 right-1/4 w-96 h-96 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
    </div>

    <!-- Hero Section -->
    <section id="home" class="relative z-10 min-h-screen flex items-center justify-center pt-20 pb-32">
        <div class="container mx-auto px-6 grid lg:grid-cols-2 gap-12 items-center">
            <!-- Left: Text -->
            <div class="space-y-8" x-data x-intersect="$el.classList.add('opacity-100', 'translate-y-0')" class="opacity-0 translate-y-10 transition-all duration-1000 ease-out">
                <div x-data="{ text: '', textToType: '🚀 Turning Ideas into Reality', type() { 
                        let i = 0; 
                        let interval = setInterval(() => { 
                            this.text += this.textToType.charAt(i); 
                            i++; 
                            if (i > this.textToType.length) clearInterval(interval); 
                        }, 100); 
                    } }" x-init="setTimeout(() => type(), 500)"
                    class="inline-block px-4 py-2 rounded-full glass-card text-sm font-medium text-indigo-300 tracking-wide uppercase typing-cursor">
                    <span x-text="text"></span>
                </div>
                <h1 class="text-5xl lg:text-7xl font-bold leading-tight" 
                    :style="`transform: translateY(${scrolled ? window.pageYOffset * 0.2 : 0}px); opacity: ${1 - (window.pageYOffset / 500)}`">
                    Hi, I'm <span class="text-gradient">Samiul</span>
                </h1>
                <p class="text-xl text-slate-300 leading-relaxed max-w-lg"
                   :style="`transform: translateY(${scrolled ? window.pageYOffset * 0.1 : 0}px); opacity: ${1 - (window.pageYOffset / 400)}`">
                    Full-Stack Developer & Deep Learning Enthusiast. I craft high-performance web applications and intelligent systems that live on the cutting edge.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="#projects" class="group relative px-8 py-4 bg-indigo-600 rounded-xl font-bold text-white overflow-hidden shadow-lg hover:shadow-indigo-500/50 transition-all duration-300 transform hover:-translate-y-1">
                        <!-- Shine Effect -->
                        <div class="absolute top-0 -inset-full h-full w-1/2 z-5 block transform -skew-x-12 bg-gradient-to-r from-transparent to-white opacity-20 group-hover:animate-shine"></div>
                        
                        <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-indigo-500 to-purple-600 opacity-100 group-hover:opacity-90 transition-opacity"></span>
                        <span class="relative flex items-center gap-2">
                             View Projects
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                        </span>
                    </a>
                    @if($hasResume)
                    <a href="{{ route('resume.download') }}" class="group relative px-8 py-4 glass-card rounded-xl font-bold text-white hover:bg-white/10 transition-all duration-300 overflow-hidden">
                        <div class="absolute top-0 -inset-full h-full w-1/2 z-5 block transform -skew-x-12 bg-gradient-to-r from-transparent to-white opacity-10 group-hover:animate-shine"></div>
                        <span class="relative">Download CV</span>
                    </a>
                    @endif
                </div>
            </div>

            <!-- Right: Avatar -->
            <div class="relative flex justify-center lg:justify-end" x-data x-intersect="$el.classList.add('opacity-100')" class="opacity-0 transition-opacity duration-1000 delay-300">
                <div class="relative w-80 h-80 lg:w-96 lg:h-96 animate-float">
                    <!-- Glass Frame -->
                    <div class="absolute inset-0 bg-gradient-to-tr from-white/10 to-transparent rounded-[2rem] transform rotate-6 scale-105 blur-sm"></div>
                    <div class="absolute inset-0 glass-card rounded-[2rem] overflow-hidden shadow-2xl border border-white/20 z-10">
                         <img src="{{ asset('images/481773494_3447077962266966_1117281271806353893_n.jpg') }}" 
                              alt="Samiul Profile" 
                              class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-700">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="relative z-10 py-24">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16" x-data x-intersect="$el.classList.add('opacity-100', 'translate-y-0')" class="opacity-0 translate-y-10 transition-all duration-700">
                <h2 class="text-4xl lg:text-5xl font-bold mb-4">What I <span class="text-gradient">Do</span></h2>
                <div class="w-24 h-1 bg-gradient-to-r from-indigo-500 to-pink-500 mx-auto rounded-full"></div>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Service 1 -->
                <div x-tilt class="reveal-3d glass-card p-8 rounded-2xl hover:bg-white/5 group">
                    <div class="w-14 h-14 bg-indigo-500/20 rounded-xl flex items-center justify-center mb-6 text-indigo-400 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4 transform translate-z-10">Full-Stack Development</h3>
                    <p class="text-slate-400 leading-relaxed transform translate-z-5">Building robust, scalable applications using Laravel, React, and modern web technologies.</p>
                </div>

                <!-- Service 2 -->
                <div x-tilt class="reveal-3d glass-card p-8 rounded-2xl hover:bg-white/5 group" style="transition-delay: 200ms">
                    <div class="w-14 h-14 bg-purple-500/20 rounded-xl flex items-center justify-center mb-6 text-purple-400 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4 transform translate-z-10">AI & Deep Learning</h3>
                    <p class="text-slate-400 leading-relaxed transform translate-z-5">Developing intelligent models for medical imaging, predictive analytics, and automation.</p>
                </div>

                <!-- Service 3 -->
                <div x-tilt class="reveal-3d glass-card p-8 rounded-2xl hover:bg-white/5 group" style="transition-delay: 400ms">
                    <div class="w-14 h-14 bg-pink-500/20 rounded-xl flex items-center justify-center mb-6 text-pink-400 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4 transform translate-z-10">IoT Solutions</h3>
                    <p class="text-slate-400 leading-relaxed transform translate-z-5">Connecting the physical world with code. Experience with RC tanks and smart sensors.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="relative z-10 py-24 bg-slate-900/40" x-data="{ activeFilter: 'all' }">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12" x-data x-intersect="$el.classList.add('opacity-100', 'translate-y-0')" class="opacity-0 translate-y-10 transition-all duration-700">
                <h2 class="text-4xl lg:text-5xl font-bold mb-4">Featured <span class="text-gradient">Projects</span></h2>
                <div class="w-24 h-1 bg-gradient-to-r from-indigo-500 to-pink-500 mx-auto rounded-full mb-8"></div>
                
                <!-- Dynamic Filter Buttons -->
                @php
                    $categories = $featuredProjects->pluck('category')->unique()->filter()->values();
                @endphp
                
                @if($categories->count() > 0)
                <div class="flex flex-wrap justify-center gap-4 animate-fade-in-up delay-200">
                    <button @click="activeFilter = 'all'" 
                            :class="{ 'bg-indigo-600 text-white shadow-lg shadow-indigo-500/30': activeFilter === 'all', 'bg-slate-800 text-slate-400 hover:bg-slate-700 hover:text-white': activeFilter !== 'all' }"
                            class="px-6 py-2 rounded-full font-semibold transition-all duration-300 border border-transparent">
                        All
                    </button>
                    @foreach($categories as $cat)
                        <button @click="activeFilter = '{{ $cat }}'" 
                                :class="{ 'bg-indigo-600 text-white shadow-lg shadow-indigo-500/30': activeFilter === '{{ $cat }}', 'bg-slate-800 text-slate-400 hover:bg-slate-700 hover:text-white': activeFilter !== '{{ $cat }}' }"
                                class="px-6 py-2 rounded-full font-semibold transition-all duration-300 border border-transparent">
                            {{ ucfirst($cat) }}
                        </button>
                    @endforeach
                </div>
                @endif
            </div>

            @if($featuredProjects->isEmpty())
                <div class="text-center text-slate-400 py-12 glass-card rounded-2xl">
                    <p class="text-xl">Projects are being polished. Check back soon!</p>
                </div>
            @else
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($featuredProjects as $project)
                        <article x-show="activeFilter === 'all' || activeFilter === '{{ $project->category }}'"
                                 x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="opacity-0 transform scale-90"
                                 x-transition:enter-end="opacity-100 transform scale-100"
                                 class="glass-card rounded-2xl overflow-hidden group flex flex-col h-full hover:shadow-2xl hover:shadow-indigo-500/10 transition-all duration-500">
                            
                            <!-- Thumbnail -->
                            <div class="h-48 overflow-hidden relative">
                                <div class="absolute inset-0 bg-slate-900/20 z-10 transition-opacity group-hover:opacity-0"></div>
                                @if($project->thumbnail)
                                    <img src="{{ $project->thumbnail }}" alt="{{ $project->title }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-slate-800 to-slate-700 flex items-center justify-center">
                                        <svg class="w-16 h-16 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                                    </div>
                                @endif
                                <div class="absolute top-4 right-4 z-20">
                                    <span class="px-3 py-1 text-xs font-bold bg-black/60 backdrop-blur-md rounded-full text-white border border-white/10 shadow-xl">
                                        {{ strtoupper($project->category ?? 'DEV') }}
                                    </span>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="p-6 flex-1 flex flex-col">
                                <h3 class="text-2xl font-bold mb-2 text-white group-hover:text-indigo-400 transition-colors">{{ $project->title }}</h3>
                                <p class="text-slate-400 mb-6 line-clamp-3 text-sm leading-relaxed">{{ $project->short_description }}</p>

                                @if($project->tech_stack)
                                    <div class="flex flex-wrap gap-2 mb-6 mt-auto">
                                        @foreach($project->tech_stack as $tech)
                                            <span class="px-2 py-1 text-xs bg-indigo-500/10 text-indigo-300 rounded border border-indigo-500/20">
                                                {{ $tech }}
                                            </span>
                                        @endforeach
                                    </div>
                                @endif

                                <div class="flex gap-4 pt-4 border-t border-white/5">
                                    @if($project->live_url)
                                        <a href="{{ $project->live_url }}" target="_blank" class="block w-full text-center py-2 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-bold transition-all shadow-lg shadow-indigo-500/20 hover:shadow-indigo-500/40">
                                            Live Demo
                                        </a>
                                    @endif
                                    @if($project->github_url)
                                        <a href="{{ $project->github_url }}" target="_blank" class="block w-full text-center py-2 rounded-lg bg-white/5 hover:bg-white/10 text-white text-sm font-bold transition-all border border-white/10">
                                            GitHub
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif
        </div>
    </section>



    <!-- Skills Section -->
    <section id="skills" class="relative z-10 py-24 bg-slate-900/50 backdrop-blur-sm">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl lg:text-5xl font-bold mb-12 text-center text-white">
                Technical <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-rose-400">Arsenal</span>
            </h2>

            @if($skills->isEmpty())
                <div class="glass-card p-8 rounded-2xl text-center">
                    <p class="text-slate-400">Loading neural pathways...</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @php
                        // Custom sort order
                        $categoryOrder = ['backend', 'frontend', 'database', 'iot', 'mobile', 'machine learning', 'deep learning', 'ai'];
                        
                        $groupedSkills = $skills->groupBy(function($item) {
                            return Str::lower($item->category);
                        })->sortBy(function($items, $key) use ($categoryOrder) {
                            $pos = array_search($key, $categoryOrder);
                            return $pos === false ? 999 : $pos;
                        });
                        
                        $catTitles = [
                            'backend' => 'Backend Development',
                            'frontend' => 'Frontend Development',
                            'database' => 'Database Management',
                            'iot' => 'IoT & Embedded Systems',
                            'mobile' => 'Mobile Development',
                            'machine learning' => 'Machine Learning',
                            'deep learning' => 'Deep Learning',
                            'ai' => 'Artificial Intelligence',
                        ];
                    @endphp

                    @foreach($groupedSkills as $category => $catSkills)
                        <div class="glass-card rounded-2xl overflow-hidden border border-slate-800 bg-[#0f172a] shadow-2xl relative z-10" x-tilt>
                            
                            {{-- Category Header --}}
                            <div class="px-8 py-5 border-b border-slate-800 bg-slate-900/50 flex items-center gap-3">
                                <div class="px-3 py-1 rounded-lg bg-indigo-500/10 border border-indigo-500/20 text-indigo-400 font-mono text-xs">
                                    {{ Str::upper(substr($category, 0, 3)) }}
                                </div>
                                <h3 class="text-xl font-bold text-white tracking-wide">
                                    {{ $catTitles[$category] ?? Str::title($category) }}
                                </h3>
                            </div>

                            <div class="flex flex-col">
                                @foreach($catSkills as $skill)
                                    <div class="reveal-flip group flex flex-col md:flex-row items-center gap-4 md:gap-8 p-6 hover:bg-slate-900/50 transition-all duration-300 border-b border-slate-800/50 last:border-0"
                                         style="transition-delay: {{ $loop->index * 100 }}ms; animation-delay: {{ $loop->index * 100 }}ms">
                                        
                                        {{-- Skill Name --}}
                                        <div class="w-full md:w-1/4 flex items-center gap-3">
                                            <div class="w-2 h-2 rounded-full bg-indigo-500 group-hover:scale-125 transition-transform duration-300"></div>
                                            <h3 class="text-lg font-bold text-white group-hover:text-indigo-400 transition-colors tracking-wide">{{ $skill->name }}</h3>
                                        </div>

                                        {{-- Progress Bar --}}
                                        <div class="w-full md:w-1/2 flex flex-col gap-2" x-data="{ width: '0%' }" x-init="setTimeout(() => width = '{{ $skill->level }}%', 500 + {{ $loop->index * 100 }})">
                                            <div class="h-2 w-full bg-slate-800/80 rounded-full overflow-hidden shadow-inner">
                                                <div class="h-full bg-indigo-500 rounded-full relative"
                                                     style="transition: width 1.5s cubic-bezier(0.4, 0, 0.2, 1);"
                                                     :style="'width: ' + width">
                                                     
                                                     {{-- Glow Effect --}}
                                                     <div class="absolute right-0 top-0 bottom-0 w-2 bg-white/50 blur-[2px]"></div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Visual Percentage --}}
                                        <div class="w-full md:w-1/4 flex justify-start md:justify-end items-center">
                                            <span class="text-2xl font-bold text-slate-700 group-hover:text-indigo-400 transition-colors font-mono opacity-50 group-hover:opacity-100">{{ $skill->level }}<span class="text-sm">%</span></span>
                                        </div>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <!-- Timeline / Study History -->
    <section id="study" class="relative z-10 py-24">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl lg:text-5xl font-bold mb-16 text-center">Journey <span class="text-gradient">& Education</span></h2>
            
            <div class="relative max-w-4xl mx-auto">
                <!-- Vertical Line -->
                <div class="absolute left-8 lg:left-1/2 top-0 bottom-0 w-0.5 bg-indigo-500/30 transform lg:-translate-x-1/2"></div>
                
                <div class="space-y-12">
                    @foreach($study as $index => $item)
                        <div class="relative flex flex-col lg:flex-row gap-8 items-center lg:items-start"
                             x-data x-intersect="$el.classList.add('opacity-100', 'translate-y-0')"
                             class="opacity-0 translate-y-10 transition-all duration-700">
                            
                            <!-- Date (Desktop Left / Mobile Top) -->
                             <div class="lg:w-1/2 lg:text-right order-2 lg:order-1 {{ $index % 2 == 0 ? 'lg:pr-12' : 'lg:hidden' }}">
                                <span class="text-indigo-400 font-bold block">{{ $item->start_year }} – {{ $item->end_year ?? 'Present' }}</span>
                                <span class="text-slate-500 text-sm">{{ $item->institution }}</span>
                            </div>

                            <!-- Dot -->
                             <div class="absolute left-8 lg:left-1/2 w-4 h-4 bg-indigo-500 rounded-full border-4 border-slate-900 transform -translate-x-1/2 order-1 lg:order-2 z-10 shadow-lg shadow-indigo-500/50 mt-1.5 animate-pulse"></div>

                            <!-- Content (Desktop Right / Mobile Bottom) -->
                            <div class="pl-20 lg:pl-12 lg:w-1/2 order-3 {{ $index % 2 == 0 ? '' : 'lg:order-1 lg:text-right lg:pr-12 lg:pl-0' }}">
                                <!-- Mobile Date Repetition or Swapped Desktop Logic -->
                                @if($index % 2 != 0)
                                    <div class="lg:hidden mb-2">
                                         <span class="text-indigo-400 font-bold block">{{ $item->start_year }} – {{ $item->end_year ?? 'Present' }}</span>
                                    </div>
                                @endif
                                
                                <div class="glass-card p-6 rounded-xl relative hover:bg-white/10 transition-colors">
                                    <h3 class="text-xl font-bold text-white mb-2">{{ $item->level }}</h3>
                                    @if($index % 2 != 0)
                                         <p class="text-indigo-400 font-bold text-sm mb-2 lg:hidden">{{ $item->institution }}</p>
                                    @else
                                         <p class="text-indigo-400 font-bold text-sm mb-2 lg:hidden">{{ $item->institution }}</p>
                                         <p class="text-indigo-400 font-bold text-sm mb-2 hidden lg:block">{{ $item->institution }}</p>
                                    @endif
                                    
                                    @if($item->grade)<div class="text-slate-300 text-sm mb-2">Grade: <span class="text-white">{{ $item->grade }}</span></div>@endif
                                    @if($item->details)<p class="text-slate-400 text-sm">{{ $item->details }}</p>@endif
                                </div>
                            </div>
                            
                            <!-- Date (Desktop Right for odd items) -->
                            <div class="lg:w-1/2 order-1 {{ $index % 2 != 0 ? 'lg:pl-12 hidden lg:block' : 'hidden' }}">
                                <span class="text-indigo-400 font-bold block">{{ $item->start_year }} – {{ $item->end_year ?? 'Present' }}</span>
                                <span class="text-slate-500 text-sm">{{ $item->institution }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    </section>

    <!-- Academic Achievements -->
    <section id="achievements" class="relative z-10 py-24 bg-slate-900/30">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl lg:text-5xl font-bold mb-16 text-center">Academic <span class="text-gradient">Achievements</span></h2>

            @if($achievements->isEmpty())
                <p class="text-center text-slate-500">No achievements recorded yet.</p>
            @else
                <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                    @foreach($achievements as $ach)
                        <div class="glass-card p-8 rounded-2xl flex gap-6 items-start hover:bg-white/5 transition-all duration-300 group"
                             x-data x-intersect="$el.classList.add('opacity-100', 'translate-y-0')"
                             class="opacity-0 translate-y-10 transition-all duration-700">
                            
                            <!-- Icon/Badges -->
                            <div class="shrink-0 w-16 h-16 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-xl flex items-center justify-center shadow-lg shadow-orange-500/20 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>

                            <div class="flex-1">
                                <span class="text-xs font-bold text-orange-400 uppercase tracking-wider mb-1 block">
                                    {{ optional($ach->achieved_at)->format('M Y') ?? 'Date N/A' }}
                                </span>
                                <h3 class="text-xl font-bold text-white mb-2 leading-tight">{{ $ach->title }}</h3>
                                @if($ach->institution)
                                    <p class="text-sm text-slate-300 mb-3 font-medium">{{ $ach->institution }}</p>
                                @endif
                                @if($ach->description)
                                    <p class="text-slate-400 text-sm leading-relaxed mb-4">{{ $ach->description }}</p>
                                @endif
                                
                                @if($ach->certificate_url)
                                    <a href="{{ $ach->certificate_url }}" target="_blank" class="inline-flex items-center text-sm font-bold text-orange-400 hover:text-orange-300 transition-colors">
                                        View Certificate <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <!-- Client Feedback -->
    <section id="feedback" class="relative z-10 py-24 bg-slate-900/30">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16 reveal-3d">
                <h2 class="text-4xl lg:text-5xl font-bold text-white mb-4">
                    Client <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-violet-600">Feedback</span>
                </h2>
                <div class="h-1.5 w-24 bg-gradient-to-r from-pink-500 to-violet-600 mx-auto rounded-full"></div>
            </div>
            
            <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                @forelse($testimonials as $testimonial)
                    <div class="glass-card p-10 rounded-2xl relative group hover:-translate-y-2 transition-transform duration-300 reveal-flip" style="animation-delay: {{ $loop->index * 0.2 }}s">
                        <div class="absolute top-8 left-8 text-6xl text-indigo-500/20 font-serif leading-none">"</div>
                        <p class="text-slate-300 text-lg leading-relaxed mb-8 relative z-10 pl-4 mt-2">
                            "{{ $testimonial->message }}"
                        </p>
                        <div class="flex items-center gap-4 pl-4 border-t border-slate-800/50 pt-6">
                            @if($testimonial->image_url)
                                <img src="{{ $testimonial->image_url }}" alt="{{ $testimonial->name }}" class="w-12 h-12 rounded-full object-cover shadow-lg shadow-indigo-500/30">
                            @else
                                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-indigo-500 to-blue-600 flex items-center justify-center text-white font-bold text-lg shadow-lg shadow-indigo-500/30">
                                    {{ substr($testimonial->name, 0, 2) }}
                                </div>
                            @endif
                            <div>
                                <h4 class="text-white font-bold">{{ $testimonial->name }}</h4>
                                <p class="text-xs text-indigo-400 font-bold tracking-wider uppercase">{{ $testimonial->role }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-2 text-center py-10 glass-card rounded-2xl">
                        <p class="text-slate-400">No testimonials yet.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Footer / Contact -->
    <section id="contact" class="py-20 border-t border-white/10 bg-black/20 text-center relative z-10">
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-indigo-900/20 pointer-events-none"></div>
        <div class="container mx-auto px-6 relative z-10">
            <div class="reveal-3d max-w-3xl mx-auto glass-card rounded-[2rem] p-12 text-center border border-white/10 shadow-2xl relative overflow-hidden group">
                 <!-- Decorative Globs -->
                <div class="absolute -top-24 -left-24 w-64 h-64 bg-indigo-500/30 rounded-full blur-3xl group-hover:bg-indigo-500/40 transition-all duration-1000"></div>
                <div class="absolute -bottom-24 -right-24 w-64 h-64 bg-pink-500/30 rounded-full blur-3xl group-hover:bg-pink-500/40 transition-all duration-1000"></div>

                <div class="grid lg:grid-cols-2 gap-12 items-center text-left" x-data="contactForm()">
                     <!-- Left Text -->
                     <div>
                        <h2 class="text-4xl font-bold mb-6 text-white">Let's Build Something <span class="text-gradient">Amazing</span></h2>
                        <p class="text-slate-300 text-lg mb-8 leading-relaxed">
                            I'm currently available for freelance projects and open to full-time opportunities.
                            Whether you have a question or just want to say hi, I'll try my best to get back to you!
                        </p>
                        
                        <div class="flex items-center gap-4 text-slate-400 mb-2">
                            <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            <span>sakib22205101472@diu.edu.bd</span>
                        </div>
                     </div>

                     <!-- Right Form -->
                     <form @submit.prevent="submitForm" class="space-y-4">
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-bold text-slate-400 mb-1">Name</label>
                                <input type="text" x-model="formData.name" required class="w-full bg-slate-900/50 border border-slate-700 rounded-lg px-4 py-3 text-white focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all" placeholder="Your Name">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-slate-400 mb-1">Email</label>
                                <input type="email" x-model="formData.email" required class="w-full bg-slate-900/50 border border-slate-700 rounded-lg px-4 py-3 text-white focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all" placeholder="email@example.com">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-400 mb-1">Subject</label>
                            <input type="text" x-model="formData.subject" class="w-full bg-slate-900/50 border border-slate-700 rounded-lg px-4 py-3 text-white focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all" placeholder="Project Inquiry">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-400 mb-1">Message</label>
                            <textarea x-model="formData.message" required rows="4" class="w-full bg-slate-900/50 border border-slate-700 rounded-lg px-4 py-3 text-white focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all" placeholder="Tell me about your project..."></textarea>
                        </div>

                        <button type="submit" :disabled="loading" class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold py-4 rounded-xl shadow-lg hover:shadow-indigo-500/50 transition-all transform hover:-translate-y-1 disabled:opacity-50 disabled:cursor-not-allowed flex justify-center items-center gap-2">
                            <svg x-show="loading" class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                            </svg>
                            <span x-text="loading ? 'Sending...' : 'Send Message'"></span>
                        </button>
                        
                        <!-- Success Message -->
                        <div x-show="success" x-transition class="bg-green-500/10 border border-green-500/20 text-green-400 px-4 py-3 rounded-lg text-sm text-center">
                            Message sent successfully! I'll get back to you soon.
                        </div>
                     </form>
                </div>

                <script>
                    function contactForm() {
                        return {
                            formData: {
                                name: '',
                                email: '',
                                subject: '',
                                message: ''
                            },
                            loading: false,
                            success: false,
                            async submitForm() {
                                this.loading = true;
                                this.success = false;
                                
                                try {
                                    let response = await fetch('{{ route('contact.store') }}', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                        },
                                        body: JSON.stringify(this.formData)
                                    });
                                    
                                    if (response.ok) {
                                        this.success = true;
                                        this.formData = { name: '', email: '', subject: '', message: '' };
                                        setTimeout(() => this.success = false, 5000);
                                    }
                                } catch (error) {
                                    alert('Something went wrong. Please try again.');
                                } finally {
                                    this.loading = false;
                                }
                            }
                        }
                    }
                </script>

            </div>
        </div>
    </section>

    <!-- Fat Footer -->
    <footer class="relative z-10 bg-slate-950 pt-20 pb-10 border-t border-white/10 overflow-hidden">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-12 mb-16">
                <!-- Brand -->
                <div class="col-span-1 md:col-span-2">
                    <h2 class="text-3xl font-bold text-white mb-4">Samiul<span class="text-indigo-500">.</span></h2>
                    <p class="text-slate-400 leading-relaxed max-w-sm">
                        Crafting digital experiences that merge creativity with code. 
                        Specializing in Full-Stack Development and Deep Learning.
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-white font-bold mb-6">Explore</h3>
                    <ul class="space-y-4">
                        <li><a href="#home" class="text-slate-400 hover:text-indigo-400 transition-colors">Home</a></li>
                        <li><a href="#projects" class="text-slate-400 hover:text-indigo-400 transition-colors">Projects</a></li>
                        <li><a href="#skills" class="text-slate-400 hover:text-indigo-400 transition-colors">Skills</a></li>
                        <li><a href="#contact" class="text-slate-400 hover:text-indigo-400 transition-colors">Contact</a></li>
                    </ul>
                </div>

                <!-- Socials -->
                <div>
                    <h3 class="text-white font-bold mb-6">Connect</h3>
                    <div class="flex gap-4">
                        <a href="https://github.com/Samiul1902" target="_blank" class="w-10 h-10 rounded-full bg-slate-900 border border-slate-700 flex items-center justify-center text-slate-400 hover:bg-white hover:text-black hover:border-white transition-all transform hover:-translate-y-1">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                        </a>
                        <a href="https://linkedin.com/in/samiul1902" target="_blank" class="w-10 h-10 rounded-full bg-slate-900 border border-slate-700 flex items-center justify-center text-slate-400 hover:bg-[#0077b5] hover:text-white hover:border-[#0077b5] transition-all transform hover:-translate-y-1">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="border-t border-white/5 pt-8 text-center md:text-left flex flex-col md:flex-row justify-between items-center text-sm text-slate-500">
                <p>&copy; {{ date('Y') }} Samiul Hasan Sakib. All rights reserved.</p>
                <div class="flex gap-4 mt-4 md:mt-0">
                    <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                    <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button -->
    <div x-data="{ show: false }" @scroll.window="show = (window.pageYOffset > 500)" x-show="show" x-transition.opacity.duration.500ms class="fixed bottom-8 right-8 z-50">
        <button @click="window.scrollTo({top: 0, behavior: 'smooth'})" 
                class="w-12 h-12 bg-indigo-600 hover:bg-indigo-500 rounded-full text-white shadow-xl flex items-center justify-center transform transition-transform hover:-translate-y-1">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
        </button>
    </div>
            


</div>

<style>
    /* 3D Flip Animation */
    @keyframes flipInX {
        from {
            opacity: 0;
            transform: perspective(400px) rotateX(90deg) scale(0.9);
        }
        40% {
            transform: perspective(400px) rotateX(-10deg) scale(1.02);
        }
        70% {
            transform: perspective(400px) rotateX(10deg);
        }
        to {
            opacity: 1;
            transform: perspective(400px) rotateX(0deg) scale(1);
        }
    }

    .reveal-flip {
        opacity: 0;
        transform: perspective(400px) rotateX(90deg);
        transform-origin: center top;
        will-change: transform, opacity;
    }

    .reveal-flip-active {
        animation: flipInX 0.8s cubic-bezier(0.4, 0, 0.2, 1) forwards;
    }

    /* Staggered delays for child elements if needed */
    .reveal-flip-group > *:nth-child(1) { animation-delay: 0.1s; }
    .reveal-flip-group > *:nth-child(2) { animation-delay: 0.2s; }
    .reveal-flip-group > *:nth-child(3) { animation-delay: 0.3s; }
    .reveal-flip-group > *:nth-child(4) { animation-delay: 0.4s; }
    .reveal-flip-group > *:nth-child(5) { animation-delay: 0.5s; }
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    if (entry.target.classList.contains('reveal-3d')) {
                        entry.target.classList.add('reveal-3d-active');
                    }
                    if (entry.target.classList.contains('reveal-flip')) {
                        entry.target.classList.add('reveal-flip-active');
                    }
                    observer.unobserve(entry.target); // Only animate once
                }
            });
        }, observerOptions);

        document.querySelectorAll('.reveal-3d, .reveal-flip').forEach(el => {
            observer.observe(el);
        });
    });
</script>
@endsection
