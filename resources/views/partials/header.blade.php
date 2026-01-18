<header x-data="{ scrolled: false }" 
        @scroll.window="scrolled = (window.pageYOffset > 20)"
        :class="{ 'bg-slate-900/80 backdrop-blur-md shadow-lg': scrolled, 'bg-transparent': !scrolled }"
        class="fixed top-0 w-full z-50 transition-all duration-300 border-b border-white/5">
    
    <nav class="max-w-7xl mx-auto px-6 h-20 flex justify-between items-center">
        <!-- Logo -->
        <a href="#home" class="text-xl font-bold tracking-widest text-white uppercase font-sans hover:opacity-80 transition-opacity">
            Samiul Hasan Sakib<span class="text-green-500 text-2xl leading-none">.</span>
        </a>

        <!-- Desktop Menu -->
        <ul class="hidden md:flex space-x-12">
            <li><a href="#home" class="text-sm font-medium text-slate-300 hover:text-white uppercase tracking-widest transition-colors">Home</a></li>
            <li><a href="#skills" class="text-sm font-medium text-slate-300 hover:text-white uppercase tracking-widest transition-colors">Skills</a></li>
            <li><a href="#projects" class="text-sm font-medium text-slate-300 hover:text-white uppercase tracking-widest transition-colors">Projects</a></li>
            <li><a href="#contact" class="text-sm font-medium text-slate-300 hover:text-white uppercase tracking-widest transition-colors">Contact</a></li>
        </ul>

        <!-- Mobile Menu Button (Hamburger) -->
        <div class="md:hidden" x-data="{ open: false }">
            <button @click="open = !open" class="text-white hover:text-green-500 focus:outline-none">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            <!-- Mobile Dropdown -->
            <div x-show="open" 
                 @click.away="open = false"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 -translate-y-2"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 -translate-y-2"
                 class="absolute top-20 left-0 w-full bg-slate-900/95 backdrop-blur-xl border-b border-white/10 shadow-xl py-4 flex flex-col items-center space-y-4">
                <a href="#home" @click="open = false" class="text-sm font-medium text-white uppercase tracking-widest">Home</a>
                <a href="#skills" @click="open = false" class="text-sm font-medium text-white uppercase tracking-widest">Skills</a>
                <a href="#projects" @click="open = false" class="text-sm font-medium text-white uppercase tracking-widest">Projects</a>
                <a href="#contact" @click="open = false" class="text-sm font-medium text-white uppercase tracking-widest">Contact</a>
            </div>
        </div>
    </nav>
</header>
