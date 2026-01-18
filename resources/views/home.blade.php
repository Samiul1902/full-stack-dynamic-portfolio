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
                <h1 class="text-5xl lg:text-7xl font-bold leading-tight">
                    Hi, I'm <span class="text-gradient">Samiul</span>
                </h1>
                <p class="text-xl text-slate-300 leading-relaxed max-w-lg">
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
                <div x-tilt class="reveal-3d glass-card p-8 rounded-2xl hover:bg-white/5 group"
                     x-intersect="$el.classList.add('reveal-3d-active')">
                    <div class="w-14 h-14 bg-indigo-500/20 rounded-xl flex items-center justify-center mb-6 text-indigo-400 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4 transform translate-z-10">Full-Stack Development</h3>
                    <p class="text-slate-400 leading-relaxed transform translate-z-5">Building robust, scalable applications using Laravel, React, and modern web technologies.</p>
                </div>

                <!-- Service 2 -->
                <div x-tilt class="reveal-3d glass-card p-8 rounded-2xl hover:bg-white/5 group"
                     style="transition-delay: 200ms"
                     x-intersect="$el.classList.add('reveal-3d-active')">
                    <div class="w-14 h-14 bg-purple-500/20 rounded-xl flex items-center justify-center mb-6 text-purple-400 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4 transform translate-z-10">AI & Deep Learning</h3>
                    <p class="text-slate-400 leading-relaxed transform translate-z-5">Developing intelligent models for medical imaging, predictive analytics, and automation.</p>
                </div>

                <!-- Service 3 -->
                <div x-tilt class="reveal-3d glass-card p-8 rounded-2xl hover:bg-white/5 group"
                     style="transition-delay: 400ms"
                     x-intersect="$el.classList.add('reveal-3d-active')">
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
    <section id="projects" class="relative z-10 py-24 bg-slate-900/40">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16" x-data x-intersect="$el.classList.add('opacity-100', 'translate-y-0')" class="opacity-0 translate-y-10 transition-all duration-700">
                <h2 class="text-4xl lg:text-5xl font-bold mb-4">Featured <span class="text-gradient">Projects</span></h2>
                <div class="w-24 h-1 bg-gradient-to-r from-indigo-500 to-pink-500 mx-auto rounded-full"></div>
            </div>

            @if($featuredProjects->isEmpty())
                <div class="text-center text-slate-400 py-12 glass-card rounded-2xl">
                    <p class="text-xl">Projects are being polished. Check back soon!</p>
                </div>
            @else
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($featuredProjects as $project)
                        <article x-tilt class="reveal-3d glass-card rounded-2xl overflow-hidden group flex flex-col h-full"
                                 x-intersect="$el.classList.add('reveal-3d-active')">
                            
                            <!-- Thumbnail -->
                            <div class="h-48 overflow-hidden relative transform-preserve-3d">
                                <div class="absolute inset-0 bg-slate-900/50 z-10 transition-opacity group-hover:opacity-0"></div>
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
                            <div class="p-6 flex-1 flex flex-col transform-preserve-3d">
                                <h3 class="text-2xl font-bold mb-2 text-white group-hover:text-indigo-400 transition-colors transform translate-z-10">{{ $project->title }}</h3>
                                <p class="text-slate-400 mb-6 line-clamp-3 transform translate-z-5">{{ $project->short_description }}</p>

                                @if($project->tech_stack)
                                    <div class="flex flex-wrap gap-2 mb-6 mt-auto transform translate-z-5">
                                        @foreach($project->tech_stack as $tech)
                                            <span class="px-2 py-1 text-xs bg-indigo-500/20 text-indigo-300 rounded border border-indigo-500/30">
                                                {{ $tech }}
                                            </span>
                                        @endforeach
                                    </div>
                                @endif

                                <div class="flex gap-4 pt-4 border-t border-white/10 transform translate-z-10">
                                    @if($project->live_url)
                                        <a href="{{ $project->live_url }}" target="_blank" class="group relative flex-1 text-center py-2 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold transition-colors shadow-lg shadow-indigo-500/30 overflow-hidden">
                                            <div class="absolute top-0 -inset-full h-full w-1/2 z-5 block transform -skew-x-12 bg-gradient-to-r from-transparent to-white opacity-20 group-hover:animate-shine"></div>
                                            <span class="relative">Live Demo</span>
                                        </a>
                                    @endif
                                    @if($project->github_url)
                                        <a href="{{ $project->github_url }}" target="_blank" class="group relative flex-1 text-center py-2 rounded-lg glass-card hover:bg-white/10 text-white text-sm font-semibold transition-colors overflow-hidden">
                                            <div class="absolute top-0 -inset-full h-full w-1/2 z-5 block transform -skew-x-12 bg-gradient-to-r from-transparent to-white opacity-10 group-hover:animate-shine"></div>
                                            <span class="relative">GitHub</span>
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

    <!-- Testimonials Section -->
    <section id="testimonials" class="relative z-10 py-24">
         <div class="container mx-auto px-6">
            <div class="text-center mb-16" x-data x-intersect="$el.classList.add('opacity-100', 'translate-y-0')" class="opacity-0 translate-y-10 transition-all duration-700">
                <h2 class="text-4xl lg:text-5xl font-bold mb-4">Client <span class="text-gradient">Feedback</span></h2>
                <div class="w-24 h-1 bg-gradient-to-r from-indigo-500 to-pink-500 mx-auto rounded-full"></div>
            </div>
            
            <div class="grid md:grid-cols-2 gap-8">
                 <!-- Testimonial 1 -->
                <div class="glass-card p-8 rounded-2xl relative">
                    <svg class="w-10 h-10 text-indigo-500/40 absolute top-6 left-6" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21L14.017 18C14.017 16.054 15.115 15.305 16.273 14.896C17.062 14.618 17.65 14.411 17.65 13.902C17.65 13.565 17.377 13.291 17.04 13.291H15.018C13.351 13.292 12.001 11.942 12.002 10.275V6C12.002 4.334 13.353 3 15.02 3H19.01C20.676 3 22.027 4.334 22.027 6V11C22.027 15.419 18.72 21 14.017 21ZM5.092 21L5.092 18C5.092 16.054 6.19 15.305 7.348 14.896C8.137 14.618 8.725 14.411 8.725 13.902C8.725 13.565 8.452 13.291 8.115 13.291H6.093C4.426 13.292 3.076 11.942 3.077 10.275V6C3.077 4.334 4.428 3 6.095 3H10.085C11.751 3 13.102 4.334 13.102 6V11C13.102 15.419 9.795 21 5.092 21Z"></path></svg>
                    <p class="text-slate-300 italic mb-6 relative z-10 pl-4 mt-4">
                        "Samiul is an exceptional problem solver. He transformed our concept into a high-performance web app with incredible attention to detail. The UI is stunning!"
                    </p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-indigo-500 rounded-full flex items-center justify-center font-bold text-white text-lg">AJ</div>
                        <div>
                            <h4 class="font-bold text-white">Alex Johnson</h4>
                            <p class="text-xs text-indigo-400 uppercase tracking-wide">Startup Founder</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="glass-card p-8 rounded-2xl relative">
                    <svg class="w-10 h-10 text-indigo-500/40 absolute top-6 left-6" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21L14.017 18C14.017 16.054 15.115 15.305 16.273 14.896C17.062 14.618 17.65 14.411 17.65 13.902C17.65 13.565 17.377 13.291 17.04 13.291H15.018C13.351 13.292 12.001 11.942 12.002 10.275V6C12.002 4.334 13.353 3 15.02 3H19.01C20.676 3 22.027 4.334 22.027 6V11C22.027 15.419 18.72 21 14.017 21ZM5.092 21L5.092 18C5.092 16.054 6.19 15.305 7.348 14.896C8.137 14.618 8.725 14.411 8.725 13.902C8.725 13.565 8.452 13.291 8.115 13.291H6.093C4.426 13.292 3.076 11.942 3.077 10.275V6C3.077 4.334 4.428 3 6.095 3H10.085C11.751 3 13.102 4.334 13.102 6V11C13.102 15.419 9.795 21 5.092 21Z"></path></svg>
                    <p class="text-slate-300 italic mb-6 relative z-10 pl-4 mt-4">
                        "His expertise in deep learning and Python backend integration allowed us to deploy our prediction model weeks ahead of schedule. Highly recommended!"
                    </p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-pink-500 rounded-full flex items-center justify-center font-bold text-white text-lg">SR</div>
                        <div>
                            <h4 class="font-bold text-white">Sarah Rahman</h4>
                            <p class="text-xs text-indigo-400 uppercase tracking-wide">Data Science Lead</p>
                        </div>
                    </div>
                </div>
            </div>
         </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="relative z-10 py-24 bg-slate-900/50 backdrop-blur-sm">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl lg:text-5xl font-bold mb-12 text-center text-white">
                Technical <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-rose-400">Arsenal</span>
            </h2>

            @if($skills->isEmpty())
                <p class="text-center text-slate-500">Skills loading...</p>
            @else
                @php $grouped = $skills->groupBy('category'); @endphp
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($grouped as $category => $items)
                        <!-- Reference-style Dark Card -->
                        <div class="bg-[#0f172a] p-8 rounded-2xl border border-slate-800 hover:border-slate-700 transition-colors" 
                             x-data x-intersect="$el.classList.add('opacity-100', 'translate-y-0')" 
                             class="opacity-0 translate-y-10 transition-all duration-700">
                             
                            <h3 class="text-xs font-bold mb-8 text-indigo-300 uppercase tracking-[0.2em]">{{ strtoupper($category) }}</h3>
                            
                            <div class="space-y-6">
                                @foreach($items as $skill)
                                    <div>
                                        <div class="flex justify-between mb-1">
                                            <span class="text-sm font-semibold text-slate-200">{{ $skill->name }}</span>
                                        </div>
                                        <!-- Volume-style Bar with Percentage Inside -->
                                        <div class="w-full bg-slate-900 rounded-full h-6 overflow-hidden border border-slate-700/50">
                                            <div x-data="{ width: 0 }"
                                                 x-init="setTimeout(() => width = {{ $skill->level }}, 500)"
                                                 class="bg-gradient-to-r from-indigo-600 to-purple-500 h-full rounded-full flex items-center justify-center shadow-[0_0_12px_rgba(99,102,241,0.5)] relative group transition-all duration-1000 ease-out min-w-[3rem]" 
                                                 :style="`width: ${width}%`">
                                                 <span class="text-xs font-bold text-white tracking-wider whitespace-nowrap z-10">{{ $skill->level }}%</span>
                                                 <!-- Shine Effect on Bar -->
                                                 <div class="absolute top-0 -inset-full h-full w-full z-0 block transform -skew-x-12 bg-gradient-to-r from-transparent to-white opacity-20 group-hover:animate-shine"></div>
                                            </div>
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

    <!-- Footer / Contact -->
    <section id="contact" class="py-20 border-t border-white/10 bg-black/20 text-center relative z-10">
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-indigo-900/20 pointer-events-none"></div>
        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-3xl mx-auto glass-card rounded-[2rem] p-12 text-center border border-white/10 shadow-2xl relative overflow-hidden group">
                 <!-- Decorative Globs -->
                <div class="absolute -top-24 -left-24 w-64 h-64 bg-indigo-500/30 rounded-full blur-3xl group-hover:bg-indigo-500/40 transition-all duration-1000"></div>
                <div class="absolute -bottom-24 -right-24 w-64 h-64 bg-pink-500/30 rounded-full blur-3xl group-hover:bg-pink-500/40 transition-all duration-1000"></div>

                <h2 class="text-4xl font-bold mb-6 text-white">Let's Build Something <span class="text-gradient">Amazing</span></h2>
                <p class="text-slate-300 text-lg mb-10 leading-relaxed">
                    I'm currently available for freelance projects and open to full-time opportunities.
                    Whether you have a question or just want to say hi, I'll try my best to get back to you!
                </p>
                
                <a href="mailto:sakib22205101472@diu.edu.bd" class="inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-xl font-bold text-white shadow-lg shadow-indigo-500/30 hover:shadow-indigo-500/50 hover:-translate-y-1 transition-all duration-300 mb-12">
                     <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                     Say Hello
                </a>

                <div class="flex justify-center gap-8 items-center border-t border-white/10 pt-8">
                    <!-- Social Links -->
                    <a href="https://github.com/Samiul1902" target="_blank" class="text-slate-400 hover:text-white transition-colors transform hover:scale-110">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                    </a>
                    <a href="https://linkedin.com/in/samiul1902" target="_blank" class="text-slate-400 hover:text-white transition-colors transform hover:scale-110">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                    </a>
                    <a href="mailto:sakib22205101472@diu.edu.bd" class="text-slate-400 hover:text-white transition-colors transform hover:scale-110">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </a>
                </div>
            </div>
            
            <div class="mt-16 text-center"> 
                <p class="text-slate-500 text-sm">
                    &copy; {{ date('Y') }} Samiul Hasan Sakib. Built with <span class="text-indigo-500">Laravel 11</span> & <span class="text-cyan-400">Tailwind CSS</span>.
                </p>
            </div>
        </div>
    </section>

</div>
@endsection
