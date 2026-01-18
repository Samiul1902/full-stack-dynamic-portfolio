<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-white leading-tight uppercase tracking-widest">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Welcome Card -->
                <div class="bg-indigo-900/20 backdrop-blur-sm border border-indigo-500/20 p-6 rounded-2xl shadow-xl col-span-full">
                    <h3 class="text-2xl font-bold text-white mb-2">Welcome Back, {{ Auth::user()->name }}! 👋</h3>
                    <p class="text-slate-400">You are in full control. Manage your portfolio content from here.</p>
                </div>

                <!-- Stats Cards (Mockup data for now) -->
                <div class="bg-[#0f172a] p-6 rounded-xl border border-slate-800 hover:border-indigo-500/50 transition-colors group">
                    <div class="flex items-center justify-between mb-4">
                        <h4 class="text-slate-400 font-bold uppercase tracking-wider text-xs">Total Projects</h4>
                        <div class="p-2 bg-indigo-500/20 rounded-lg text-indigo-400 group-hover:bg-indigo-500 group-hover:text-white transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        </div>
                    </div>
                    <span class="text-3xl font-bold text-white block mb-1">{{ \App\Models\Project::count() }}</span>
                    <span class="text-sm text-green-400 font-medium flex items-center gap-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                        Portfolio Items
                    </span>
                </div>

                <div class="bg-[#0f172a] p-6 rounded-xl border border-slate-800 hover:border-pink-500/50 transition-colors group">
                    <div class="flex items-center justify-between mb-4">
                        <h4 class="text-slate-400 font-bold uppercase tracking-wider text-xs">Total Skills</h4>
                        <div class="p-2 bg-pink-500/20 rounded-lg text-pink-400 group-hover:bg-pink-500 group-hover:text-white transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                    </div>
                    <span class="text-3xl font-bold text-white block mb-1">{{ \App\Models\Skill::count() }}</span>
                    <span class="text-sm text-pink-400 font-medium">Technical Abilities</span>
                </div>

            </div>
            
            <div class="mt-8 flex gap-4">
                <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center px-6 py-3 bg-indigo-600 hover:bg-indigo-500 text-white font-bold rounded-lg transition-all shadow-lg hover:shadow-indigo-500/30">
                    + Add New Project
                </a>
                <a href="{{ route('admin.skills.create') }}" class="inline-flex items-center px-6 py-3 bg-slate-800 hover:bg-slate-700 text-white font-bold rounded-lg border border-slate-700 transition-all">
                    + Add Skill
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
