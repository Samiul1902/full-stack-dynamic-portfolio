<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-white leading-tight uppercase tracking-widest">
            {{ __('Edit Achievement') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#0f172a] border border-slate-800 overflow-hidden shadow-xl sm:rounded-2xl">
                <div class="p-8">
                    <form method="POST" action="{{ route('admin.achievements.update', $achievement->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Title -->
                        <div class="mb-6">
                            <label for="title" class="block text-slate-300 text-sm font-bold mb-2 uppercase tracking-wide">Title:</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $achievement->title) }}" class="bg-slate-900 border border-slate-700 rounded-lg w-full py-3 px-4 text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-colors" required>
                        </div>

                        <!-- Institution -->
                        <div class="mb-6">
                            <label for="institution" class="block text-slate-300 text-sm font-bold mb-2 uppercase tracking-wide">Institution/Organization (Optional):</label>
                            <input type="text" name="institution" id="institution" value="{{ old('institution', $achievement->institution) }}" class="bg-slate-900 border border-slate-700 rounded-lg w-full py-3 px-4 text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-colors">
                        </div>

                        <!-- Date -->
                        <div class="mb-6">
                            <label for="achieved_at" class="block text-slate-300 text-sm font-bold mb-2 uppercase tracking-wide">Date Achieved:</label>
                            <input type="date" name="achieved_at" id="achieved_at" value="{{ old('achieved_at', $achievement->achieved_at->format('Y-m-d')) }}" class="bg-slate-900 border border-slate-700 rounded-lg w-full py-3 px-4 text-white focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-colors" required>
                        </div>

                        <!-- Certificate URL -->
                        <div class="mb-6">
                            <label for="certificate_url" class="block text-slate-300 text-sm font-bold mb-2 uppercase tracking-wide">Certificate URL (Optional):</label>
                            <input type="url" name="certificate_url" id="certificate_url" value="{{ old('certificate_url', $achievement->certificate_url) }}" class="bg-slate-900 border border-slate-700 rounded-lg w-full py-3 px-4 text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-colors">
                        </div>

                        <!-- Description -->
                        <div class="mb-6">
                            <label for="description" class="block text-slate-300 text-sm font-bold mb-2 uppercase tracking-wide">Description (Optional):</label>
                            <textarea name="description" id="description" rows="4" class="bg-slate-900 border border-slate-700 rounded-lg w-full py-3 px-4 text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-colors">{{ old('description', $achievement->description) }}</textarea>
                        </div>

                        <div class="flex items-center justify-between mt-8 pt-6 border-t border-slate-800">
                             <a href="{{ route('admin.achievements.index') }}" class="text-slate-400 hover:text-white font-semibold transition-colors">
                                Cancel
                            </a>
                            <button class="bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-3 px-8 rounded-lg shadow-lg hover:shadow-indigo-500/30 transition-all uppercase tracking-wide text-sm" type="submit">
                                Update Achievement
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
