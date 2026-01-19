<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-white leading-tight uppercase tracking-widest">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-bold mb-4">Welcome, {{ Auth::user()->name }}!</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <!-- Projects Stats -->
                        <div class="relative bg-slate-900 border border-slate-800 p-6 rounded-2xl overflow-hidden group hover:border-indigo-500/50 transition-all duration-300">
                            <div class="absolute top-0 right-0 w-24 h-24 bg-indigo-500/10 rounded-full blur-2xl -mr-12 -mt-12"></div>
                            <h4 class="text-lg font-medium text-slate-400">Projects</h4>
                            <p class="text-4xl font-bold text-white mt-2 mb-4">{{ $projectCount }}</p>
                            <a href="{{ route('admin.projects.index') }}" class="inline-flex items-center text-indigo-400 hover:text-indigo-300 text-sm font-semibold transition-colors">
                                Manage Projects <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </a>
                        </div>

                        <!-- Skills Stats -->
                        <div class="relative bg-slate-900 border border-slate-800 p-6 rounded-2xl overflow-hidden group hover:border-emerald-500/50 transition-all duration-300">
                            <div class="absolute top-0 right-0 w-24 h-24 bg-emerald-500/10 rounded-full blur-2xl -mr-12 -mt-12"></div>
                            <h4 class="text-lg font-medium text-slate-400">Skills</h4>
                            <p class="text-4xl font-bold text-white mt-2 mb-4">{{ $skillCount }}</p>
                            <a href="{{ route('admin.skills.index') }}" class="inline-flex items-center text-emerald-400 hover:text-emerald-300 text-sm font-semibold transition-colors">
                                Manage Skills <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </a>
                        </div>

                         <!-- Study History Stats -->
                         <div class="relative bg-slate-900 border border-slate-800 p-6 rounded-2xl overflow-hidden group hover:border-purple-500/50 transition-all duration-300">
                            <div class="absolute top-0 right-0 w-24 h-24 bg-purple-500/10 rounded-full blur-2xl -mr-12 -mt-12"></div>
                            <h4 class="text-lg font-medium text-slate-400">Education</h4>
                            <p class="text-4xl font-bold text-white mt-2 mb-4">{{ $studyCount }}</p>
                            <a href="{{ route('admin.study-history.index') }}" class="inline-flex items-center text-purple-400 hover:text-purple-300 text-sm font-semibold transition-colors">
                                Manage Education <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </a>
                        </div>

                        <!-- Achievements Stats -->
                         <div class="relative bg-slate-900 border border-slate-800 p-6 rounded-2xl overflow-hidden group hover:border-amber-500/50 transition-all duration-300">
                            <div class="absolute top-0 right-0 w-24 h-24 bg-amber-500/10 rounded-full blur-2xl -mr-12 -mt-12"></div>
                            <h4 class="text-lg font-medium text-slate-400">Awards</h4>
                            <p class="text-4xl font-bold text-white mt-2 mb-4">{{ $achievementCount }}</p>
                            <a href="{{ route('admin.achievements.index') }}" class="inline-flex items-center text-amber-400 hover:text-amber-300 text-sm font-semibold transition-colors">
                                Manage Awards <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </a>
                        </div>

                         <!-- Resume Stats -->
                         <div class="relative bg-slate-900 border border-slate-800 p-6 rounded-2xl overflow-hidden group hover:border-pink-500/50 transition-all duration-300">
                            <div class="absolute top-0 right-0 w-24 h-24 bg-pink-500/10 rounded-full blur-2xl -mr-12 -mt-12"></div>
                            <h4 class="text-lg font-medium text-slate-400">Resumes</h4>
                            <p class="text-4xl font-bold text-white mt-2 mb-4">{{ $resumeCount }}</p>
                            <a href="{{ route('admin.resumes.index') }}" class="inline-flex items-center text-pink-400 hover:text-pink-300 text-sm font-semibold transition-colors">
                                Manage CVs <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
