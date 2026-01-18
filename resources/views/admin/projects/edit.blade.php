<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-white leading-tight uppercase tracking-widest">
            {{ __('Edit Project') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#0f172a] border border-slate-800 overflow-hidden shadow-xl sm:rounded-2xl">
                <div class="p-8">
                    <form method="POST" action="{{ route('admin.projects.update', $project->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Title -->
                        <div class="mb-6">
                            <label for="title" class="block text-slate-300 text-sm font-bold mb-2 uppercase tracking-wide">Title:</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $project->title) }}" class="bg-slate-900 border border-slate-700 rounded-lg w-full py-3 px-4 text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-colors" required>
                        </div>

                        <!-- Description -->
                         <div class="mb-6">
                            <label for="description" class="block text-slate-300 text-sm font-bold mb-2 uppercase tracking-wide">Description:</label>
                            <textarea name="description" id="description" rows="5" class="bg-slate-900 border border-slate-700 rounded-lg w-full py-3 px-4 text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-colors" required>{{ old('description', $project->description) }}</textarea>
                        </div>

                        <!-- Tech Stack -->
                         <div class="mb-6">
                            <label for="tech_stack" class="block text-slate-300 text-sm font-bold mb-2 uppercase tracking-wide">Tech Stack (comma separated):</label>
                            <input type="text" name="tech_stack" id="tech_stack" value="{{ is_array($project->tech_stack) ? implode(', ', $project->tech_stack) : $project->tech_stack }}" class="bg-slate-900 border border-slate-700 rounded-lg w-full py-3 px-4 text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-colors">
                        </div>

                        <!-- Image -->
                        <div class="mb-6">
                            <label for="image_url" class="block text-slate-300 text-sm font-bold mb-2 uppercase tracking-wide">Project Image:</label>
                            @if($project->image_url)
                                <div class="mb-4 p-2 bg-slate-800 rounded-lg inline-block border border-slate-700">
                                    <img src="{{ $project->image_url }}" alt="Current Image" class="h-24 w-auto rounded">
                                </div>
                            @endif
                            <input type="file" name="image_url" id="image_url" class="bg-slate-900 border border-slate-700 rounded-lg w-full py-3 px-4 text-slate-300 focus:outline-none focus:border-indigo-500 transition-colors">
                        </div>

                        <!-- URLs -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                            <div>
                                <label for="project_url" class="block text-slate-300 text-sm font-bold mb-2 uppercase tracking-wide">Live URL:</label>
                                <input type="url" name="project_url" id="project_url" value="{{ old('project_url', $project->project_url) }}" class="bg-slate-900 border border-slate-700 rounded-lg w-full py-3 px-4 text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-colors">
                            </div>
                             <div>
                                <label for="github_url" class="block text-slate-300 text-sm font-bold mb-2 uppercase tracking-wide">GitHub URL:</label>
                                <input type="url" name="github_url" id="github_url" value="{{ old('github_url', $project->github_url) }}" class="bg-slate-900 border border-slate-700 rounded-lg w-full py-3 px-4 text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-colors">
                            </div>
                        </div>

                        <div class="flex items-center justify-between mt-8 pt-6 border-t border-slate-800">
                             <a href="{{ route('admin.projects.index') }}" class="text-slate-400 hover:text-white font-semibold transition-colors">
                                Cancel
                            </a>
                            <button class="bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-3 px-8 rounded-lg shadow-lg hover:shadow-indigo-500/30 transition-all uppercase tracking-wide text-sm" type="submit">
                                Update Project
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
