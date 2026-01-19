<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-white leading-tight uppercase tracking-widest">
            {{ __('Create Skill') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#0f172a] border border-slate-800 overflow-hidden shadow-xl sm:rounded-2xl">
                <div class="p-8">
                    <form method="POST" action="{{ route('admin.skills.store') }}">
                        @csrf

                        <!-- Name -->
                        <div class="mb-6">
                            <label for="name" class="block text-slate-300 text-sm font-bold mb-2 uppercase tracking-wide">Skill Name:</label>
                            <input type="text" name="name" id="name" placeholder="e.g. Laravel" class="bg-slate-900 border border-slate-700 rounded-lg w-full py-3 px-4 text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-colors" required>
                        </div>

                        <!-- Level -->
                         <div class="mb-6">
                            <label for="level" class="block text-slate-300 text-sm font-bold mb-2 uppercase tracking-wide">Proficiency Level (0-100):</label>
                            <input type="number" name="level" id="level" min="0" max="100" class="bg-slate-900 border border-slate-700 rounded-lg w-full py-3 px-4 text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-colors" required>
                        </div>

                        <!-- Category -->
                         <div class="mb-6" x-data="{ 
                            selected: 'Frontend', 
                            custom: '',
                            get finalVal() { return this.selected === 'Other' ? this.custom : this.selected }
                         }">
                            <label class="block text-slate-300 text-sm font-bold mb-2 uppercase tracking-wide">Category:</label>
                             
                            <!-- Dropdown -->
                            <select x-model="selected" class="bg-slate-900 border border-slate-700 rounded-lg w-full py-3 px-4 text-white focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-colors mb-3">
                                <option value="Frontend">Frontend</option>
                                <option value="Backend">Backend</option>
                                <option value="Database">Database</option>
                                <option value="Tools">Tools/DevOps</option>
                                <option value="IoT">IoT & Hardware</option>
                                <option value="Mobile">Mobile Development</option>
                                <option value="Machine Learning">Machine Learning</option>
                                <option value="AI">Artificial Intelligence</option>
                                <option value="Other">Other / Custom</option>
                            </select>

                            <!-- Custom Input (conditional) -->
                            <div x-show="selected === 'Other'" x-transition 
                                 x-cloak
                                 class="mt-2">
                                <input type="text" x-model="custom" placeholder="Enter custom category name..." 
                                       class="bg-slate-800 border border-indigo-500/50 rounded-lg w-full py-3 px-4 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all">
                                <p class="text-xs text-indigo-400 mt-1">* This new category will be created automatically.</p>
                            </div>

                            <!-- Real submission input -->
                            <input type="hidden" name="category" :value="finalVal">
                        </div>

                        <div class="flex items-center justify-end mt-8">
                            <button class="bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-3 px-8 rounded-lg shadow-lg hover:shadow-indigo-500/30 transition-all uppercase tracking-wide text-sm" type="submit">
                                Create Skill
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
