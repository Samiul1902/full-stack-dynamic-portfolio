<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-white leading-tight uppercase tracking-widest">
            {{ __('Edit Study History') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#0f172a] border border-slate-800 overflow-hidden shadow-xl sm:rounded-2xl">
                <div class="p-8">
                    <form method="POST" action="{{ route('admin.study-history.update', $studyHistory->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Institution -->
                        <div class="mb-6">
                            <label for="institution" class="block text-slate-300 text-sm font-bold mb-2 uppercase tracking-wide">Institution:</label>
                            <input type="text" name="institution" id="institution" value="{{ old('institution', $studyHistory->institution) }}" class="bg-slate-900 border border-slate-700 rounded-lg w-full py-3 px-4 text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-colors" required>
                        </div>

                        <!-- Level -->
                        <div class="mb-6">
                            <label for="level" class="block text-slate-300 text-sm font-bold mb-2 uppercase tracking-wide">Level/Degree:</label>
                            <input type="text" name="level" id="level" value="{{ old('level', $studyHistory->level) }}" class="bg-slate-900 border border-slate-700 rounded-lg w-full py-3 px-4 text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-colors" required>
                        </div>

                        <div class="grid grid-cols-2 gap-6 mb-6">
                            <!-- Start Year -->
                            <div>
                                <label for="start_year" class="block text-slate-300 text-sm font-bold mb-2 uppercase tracking-wide">Start Year:</label>
                                <input type="number" name="start_year" id="start_year" min="1900" max="2100" value="{{ old('start_year', $studyHistory->start_year) }}" class="bg-slate-900 border border-slate-700 rounded-lg w-full py-3 px-4 text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-colors" required>
                            </div>

                            <!-- End Year -->
                            <div>
                                <label for="end_year" class="block text-slate-300 text-sm font-bold mb-2 uppercase tracking-wide">End Year (Leave blank if present):</label>
                                <input type="number" name="end_year" id="end_year" min="1900" max="2100" value="{{ old('end_year', $studyHistory->end_year) }}" class="bg-slate-900 border border-slate-700 rounded-lg w-full py-3 px-4 text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-colors">
                            </div>
                        </div>

                        <!-- Grade -->
                         <div class="mb-6">
                            <label for="grade" class="block text-slate-300 text-sm font-bold mb-2 uppercase tracking-wide">Grade/CGPA:</label>
                            <input type="text" name="grade" id="grade" value="{{ old('grade', $studyHistory->grade) }}" class="bg-slate-900 border border-slate-700 rounded-lg w-full py-3 px-4 text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-colors">
                        </div>

                        <!-- Details -->
                        <div class="mb-6">
                            <label for="details" class="block text-slate-300 text-sm font-bold mb-2 uppercase tracking-wide">Details (Optional):</label>
                            <textarea name="details" id="details" rows="4" class="bg-slate-900 border border-slate-700 rounded-lg w-full py-3 px-4 text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-colors">{{ old('details', $studyHistory->details) }}</textarea>
                        </div>

                        <div class="flex items-center justify-between mt-8 pt-6 border-t border-slate-800">
                             <a href="{{ route('admin.study-history.index') }}" class="text-slate-400 hover:text-white font-semibold transition-colors">
                                Cancel
                            </a>
                            <button class="bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-3 px-8 rounded-lg shadow-lg hover:shadow-indigo-500/30 transition-all uppercase tracking-wide text-sm" type="submit">
                                Update Entry
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
